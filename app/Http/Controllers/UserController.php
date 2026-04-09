<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginwindow()
    {
        return view("loginWindow");
    }
    public function adminSignup(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user =  User::create($data);
        // if($user){
        //     return redirect()->route('adminLogin')->with('success','');
        // }
        return view('dashboard');
    }

    public function adminlogin(Request $request)
    {
        $user = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        if (Auth::attempt($user)) {
            return redirect("dashboard");
        }

        return back()->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return view('loginWindow');
    }

    public function dashboard()

    {
        return view('dashboard');
        // if (Auth::check()) {
        //     return view("dashboard");
        // } else {
        //     return view("loginWindow");
        // }
    }
}
