<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Added this
use Illuminate\Support\Facades\Session;

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

        $user = Register::create([
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

        // Attempt to log the user in using Laravel's Auth system
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/nike/front'); 
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout(); // Use Auth logout
        Session::invalidate();
        Session::regenerateToken();
        return redirect('/login');
    }

    public function front()
    {
        // The middleware handles this now, but keeping the function as requested
        return view('nike.front'); 
    }
}