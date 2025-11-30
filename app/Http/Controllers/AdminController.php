<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.qladmin');
    }
    public function reports(){
        return view('admin.report-manager');
    }
}
