<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestRegister;
use App\Mail\ConfirmAccountMail;
use App\Mail\ForgetPasswordMail;
use App\Models\AmountToConnect;
use App\Models\Connect;
use App\Models\Hobby;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Str;
use function PHPUnit\Framework\returnArgument;

class AuthController extends Controller
{
    public function login(RequestLogin $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            //Auth::login($user); no need because Auth::attempt automatically logs in the user
            return redirect()->route('homepage.get')->with(
                ['message' => 'Logged in successfully!', 'alert-type' => 'success']
            ); // redirect and send notification
        }
        return back()->with(
            ['message' => 'Invalid email or password', 'alert-type' => 'error']
        );
    }
    public function register(RequestRegister $request)
    {
        // Log::info('Register request received', $request->all());
        $validated = $request;
        $user = User::create([
            "user_id" => Str::uuid(),
            "user_name" => $validated['user_name'],
            "email" => $validated['email'],
            "user_image" => "", // because it is already in public when server is served
            "password" => Hash::make($validated['password']),
            "user_gender" => $validated['user_gender'] == "Nam" ? "Male" : "Female",
            "year_of_birth" => $validated['year_of_birth'],
            "verify_token" => Str::random(64),
            "verify_at" => now(),
            'report_time'=>0
        ]);
        Mail::to($user)->send(new ConfirmAccountMail($user));
        return redirect(route('register.get'))->with(['message' => 'Mail xác thực đã được gửi', 'alert-type' => 'success']);
    }

    public function confirmRegister(Request $request)
    {
        $url_arr = array_slice(explode('/', $request->getPathInfo()), 1);
        if (count($url_arr) < 4) {
            return redirect(route('homepage.get'))->with(['message' => 'Unauthorize or Token is null', "alert-type" => "error"]);
        }
        $user = User::where("user_id", "=", $url_arr[2])->first();
        if ($user === null || $url_arr[3] !== $user["verify_token"] || $user["verify_token"] === null) {
            return redirect(route('register.get'))->with(['message' => 'Unauthorize or Token is null', "alert-type" => "error"]);
        }
        $user->update(['verify_token' => null, 'verify_at' => null]);
        $role = Role::where('role_name', '=', 'regular')->get();
        UserRole::create([
            'role_id' => $role[0]->role_id,
            'user_id' => $user['user_id']
        ]);
        Connect::create(
            [
                'user_id' => $user['user_id'],
                'connect_quantity' => 0
            ]
        );
        Hobby::create([
            'user_id' => $user['user_id'],
            'hobbies_id' => Str::uuid(),
            'hobbies_name' => ''
        ]);
        AmountToConnect::create(['amountConnect_id'=>Str::uuid(),"amount"=>0,"user_id"=>$user->user_id]);
        Auth::login($user);
        return redirect()->route('homepage.get')->with(
            ['message' => 'Account created successfully!', 'alert-type' => 'success']
        );
    }

    public function logout(Request $request)
    {
        Auth::logout(); // logout current user
        $request->session()->invalidate(); // completely destroy the current session and generate new session ID
        $request->session()->regenerateToken(); // generating new csrf token for new session 
        return redirect()->route('homepage.get');
    }

    public function forget(Request $request)
    {
        try {
            $request->validate([
                "email" => "required|email"
            ]);
            $user = User::where("email", "=", $request->email)->first(); // get value and model as well
            if ($user === null) {
                return back()->with(['message' => "No email found", 'alert-type' => 'error']);
            }
            $user->update(["verify_token" => Str::random(64), "verify_at" => now()]);
            // dd($user);
            Mail::to($request->email)->send(new ForgetPasswordMail($user));
        } catch (\Exception $e) {
            return redirect(route('forgetpassword.get'))->with(['message' => $e->getMessage(), 'alert-type' => 'error']);
        }
        return redirect(route('forgetpassword.get'))->with(['message' => 'Mail sent.', 'alert-type' => 'success']);
    }
    public function reset(Request $request)
    {
        // dd($request);
        $request->validate(
            [
                "user_id" => "required|string",
                "password" => "required|string|confirmed|min:6",
                "verify_token" => "required|string"
            ]
        );
        $user = User::where('user_id', '=', $request->user_id)->first();
        if ($user["verify_token"] !== $request["verify_token"] || $user["verify_token"] === null) {
            return redirect(route('login.get'))->with(['message' => 'Unauthorize or Token is null', 'alert-type' => 'error']);
        }
        $user->update(["password" => Hash::make($request->password), "verify_token" => null, "verify_at" => null]);
        return redirect(route('login.get'))->with(
            ['message' => 'Login again with new password', 'alert-type' => 'success']
        );
    }
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {
            // Get user info from Socialite
            $socialUser = Socialite::driver($provider)->user();

            // Check if this user already exists in our DB based on Email OR Provider ID
            $user = User::where('email', $socialUser->getEmail())
                ->orWhere('provider_id', $socialUser->getId())
                ->first();

            if ($user) {
                // If user exists, just update their provider ID if it's missing
                if (!$user->provider_id) {
                    $user->update([
                        'provider_id' => $socialUser->getId(),
                        'provider_name' => $provider,
                    ]);
                }

                // Login the user
                Auth::login($user);

            } else {
                // User doesn't exist, create a new one
                $user = User::create([
                    "user_id" => Str::uuid(),
                    'user_name' => $socialUser->getName() ?? $socialUser->getNickname(), // GitHub uses nickname often
                    'email' => $socialUser->getEmail(),
                    'provider_id' => $socialUser->getId(),
                    'provider_name' => $provider,
                    'password' => Hash::make(Str::random(16)), // Generate random password
                    "user_image" => "", // because it is already in public when server is served
                    "user_gender" => "Other",
                    "year_of_birth" => 2007,
                    'report_time'=>0
                ]);
                $role = Role::where('role_name', '=', 'regular')->get();
                UserRole::create([
                    'role_id' => $role[0]->role_id,
                    'user_id' => $user['user_id']
                ]);
                Connect::create(
                    [
                        'user_id' => $user['user_id'],
                        'connect_quantity' => 0
                    ]
                );
                Hobby::create([
                    'user_id' => $user['user_id'],
                    'hobbies_id' => Str::uuid(),
                    'hobbies_name' => ''
                ]);
                Auth::login($user);
            }

            // Redirect to dashboard or home
            return redirect()->route('homepage.get')->with(['message' => 'Logged in successfully!', 'alert-type' => 'success']);

        } catch (\Exception $e) {
            dd($e);
            // Handle errors (e.g., user denied access)
            return redirect()->route('login.get')->with(['message' => 'Login failed: ' . $e->getMessage(), 'alert-type' => 'error']);
        }
    }
}
