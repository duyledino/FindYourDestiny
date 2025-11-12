<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ensure this view file exists: resources/views/users/index.blade.php
        $users = User::all();
        return view('users.index', compact('users')); // this view file must exist
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/');
    }
}
