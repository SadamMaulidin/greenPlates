<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin-login');
    }

    public function Dashboard()
    {
        return view('admin.admin-dashboard');
    }

    public function Login(Request $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        }else {
            return back()->with('error', 'invalid email or password');
        }
    }
}
