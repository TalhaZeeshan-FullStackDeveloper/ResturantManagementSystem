<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Product; // or whatever your model is

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('login.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:registers',
            'password'=>'required|min:6'
        ]);

        Register::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registration successful');
    }

    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = Register::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user]);
            return redirect('/nike/front');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    public function front()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }
        return view('/nike.front');
    }
}