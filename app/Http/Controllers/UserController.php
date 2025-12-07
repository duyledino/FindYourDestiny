<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEditUser;
use App\Models\AmountToConnect;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Http\Request;
use Str;

class UserController extends Controller
{
    public function profile()
    {
        return view('users.Profile');
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
        $amount = AmountToConnect::where('user_id','=',$request->user_id)->first();
        if (count($user) === 0) {
            return redirect()->route('homepage.get')->with('error', 'No user found.');
        }
        $user[0]['amount']=$amount["amount"];
        $user[0]['hobbies'] = array();
        $user[0]['hobbies'] = $hobbies[0]['hobbies_name'] ?? "";
        // dd($user);
        return view('users.detail_user', ["user" => $user[0]]);
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
        if($request["amount"] === "0" || $request["amount"] === '' || $request["amount"] === null){
            return back()->with(["message"=>"Connect tối thiểu phải là 20","alert-type"=>"error"]);
        }
        $path = "";
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $fileName = strtr(Str::uuid(), 0, 8) . "-" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
            $absolutePath = storage_path('app/public/images/' . $fileName);
            // dd($absolutePath);
            if (file_exists($absolutePath)) {
                // dd($absolutePath);
                chmod($absolutePath, 0644); // 0644 is standard for files, 0755 is for folders
            }
            // dd($path);
        }
        $user = User::where('user_id', '=', $request->user_id)->update([
            "user_image" => $path,
            "user_gender" => $request->user_gender,
            "height" => $request->height / 100,
            "user_address" => $request->user_address,
            "slogan" => $request->slogan,
            "year_of_birth" => $request->year_of_birth,
        ]);
        $updateHobbies = Hobby::where('user_id', "=", $request->user_id)->update(['hobbies_name' => $request->hobbies]);
        return redirect(route('profile.edit.get', [$request->user_id]))->with([
            'message' => 'Update successfully',
            'alert-type' => 'success',
        ]);
    }
    
}
