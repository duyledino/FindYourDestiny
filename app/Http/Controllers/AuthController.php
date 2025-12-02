<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestRegister;
use App\Mail\ForgetPasswordMail;
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
use Str;

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
        $role = Role::where('role_name', '=', 'regular')->get();
        $user = User::create([
            "user_id" => Str::uuid(),
            "user_name" => $validated['user_name'],
            "email" => $validated['email'],
            "user_image" => "", // because it is already in public when server is served
            "password" => Hash::make($validated['password']),
            "user_gender" => $validated['user_gender'] == "Nam" ? "Male" : "Female",
            "year_of_birth" => $validated['year_of_birth'],
        ]);

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
        $request->validate([
            "email" => "required|email"
        ]);
        $user = User::where("email", "=", $request->email)->first(); // get value and model as well
        if ($user === null) {
            return back(404)->with(['message' => "No email found", 'alert-type' => 'error']);
        }
        // dd($user);

        Mail::to($request->email)->send(new ForgetPasswordMail($user));
        return redirect(route('forgetpassword.get'))->with(['message' => 'Mail sent.', 'alert-type' => 'success']);
    }
    public function reset(Request $request)
    {
        $request->validate(
            [
                "user_id" => "required|string",
                "password" => "required|string|confirmed|min:6"
            ]
        );
        // dd($request);
        User::where('user_id', '=', $request->user_id)->update(["password" => Hash::make($request->password)]);
        return redirect(route('login.get'))->with(
            ['message' => 'Login again with new password', 'alert-type' => 'success']
        );
    }
}
