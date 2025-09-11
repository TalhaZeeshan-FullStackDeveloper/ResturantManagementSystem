<?php

namespace App\Http\Controllers;

use App\Models\register1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Register1Controller extends Controller
{
    public function showRegisterForm()
    {
        return view('login1.register1');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:register1s',
            'password'=>'required|min:6'
        ]);

        Register1::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('/login1')->with('success', 'Registration successful');
    }

    public function showLoginForm()
    {
        return view('login1.login1');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = Register1::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect('/nike/adminpannel');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout1()
    {
        Session::flush();
        return redirect('/login1');
    }

    public function front()
    {
        if (!session()->has('user')) {
            return redirect('/login1');
        }
        return view('/nike.adminpannel');
    }
}