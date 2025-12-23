<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEditUser;
use App\Models\AmountToConnect;
use App\Models\Date;
use App\Models\Hobby;
use App\Models\Transaction;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Str;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $page = $request->query('page') == null ? 1 : $request->query('page');
        if (auth()->user() == null || auth()->user()->user_id == null) {
            return redirect(route('login.get'))->with(['message' => "", "alert-type" => "error"]);
        }
        $user_id = auth()->user()->user_id;
        $transactions = Transaction::where("user_id", '=', $user_id)->limit(10)->offset(10 * ($page - 1))->orderByDesc('create_at')->get();
        // dd($transactions);
        $total_page = ceil(Transaction::where("user_id","=",$user_id)->count()/10);
        return view('users.Profile', ["transactions" => $transactions,"page"=>$page,"total_page"=>$total_page]);
    }

    public function homepage()
    {
        $users = User::inRandomOrder()->limit(5)->get();
        // dd($users);

        return view('Homepage', ["users" => $users]);
    }


    public function detail(Request $request)
    {
        $user = User::where('user_id', '=', $request['user_id'])->get();
        $hobbies = Hobby::where('user_id', '=', $request['user_id'])->get();
        $amount = AmountToConnect::where('user_id', '=', $request->user_id)->first();
        if (count($user) === 0) {
            return redirect()->route('homepage.get')->with('error', 'No user found.');
        }
        $user[0]['amount'] = $amount["amount"];
        $user[0]['hobbies'] = array();
        $user[0]['hobbies'] = $hobbies[0]['hobbies_name'] ?? "";
        $date_exists = DB::table('chat as u')
            ->where(function ($q) use ($request) {
                $q->where('u.user1_id', auth()->user()->user_id ?? '')
                    ->where('u.user2_id', $request->user_id);
            })
            ->orWhere(function ($q) use ($request) {
                $q->where('u.user1_id', $request->user_id)
                    ->where('u.user2_id', auth()->user()->user_id ?? '');
            })
            ->first();
        // dd($date_exists);
        return view('users.detail_user', ["user" => $user[0], "date_exists" => $date_exists]);
    }

    public function getEdit(Request $request)
    {
        $user = User::where('user_id', '=', $request['user_id'])->get();
        $hobbies = Hobby::where('user_id', '=', $request['user_id'])->get('hobbies_name');
        $user[0]['hobbies'] = array();
        $user[0]['hobbies'] = $hobbies[0]['hobbies_name'] ?? "";
        return view('users.edit_user', ["user" => $user[0]]);
    }

    public function edit(RequestEditUser $request)
    {
        // dd($request);
        if ($request["amount"] === "0" || $request["amount"] === '' || $request["amount"] === null) {
            return back()->withInput()->with(["message" => "Connect tối thiểu phải là 20", "alert-type" => "error"]);
        }
        $path = "";
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $fileName = strtr(Str::uuid(), 0, 8) . "-" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
            $absolutePath = storage_path('app/public/images/' . $fileName);
        }
        $user = User::where('user_id', '=', $request->user_id)->update([
            "user_image" => $path,
            "user_gender" => $request->user_gender,
            "height" => $request->height / 100,
            "user_address" => $request->user_address,
            "slogan" => $request->slogan,
            "year_of_birth" => $request->year_of_birth,
        ]);
        AmountToConnect::where('user_id', "=", $request["user_id"])->update(["amount" => $request['amount']]);
        $updateHobbies = Hobby::where('user_id', "=", $request->user_id)->update(['hobbies_name' => $request->hobbies]);
        return redirect(route('profile.edit.get', [$request->user_id]))->with([
            'message' => 'Update successfully',
            'alert-type' => 'success',
        ]);
    }

}
