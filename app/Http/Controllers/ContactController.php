<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        // Send email
        Mail::raw("Name: {$validated['name']}\nEmail: {$validated['email']}\n\nMessage:\n{$validated['message']}", function ($mail) use ($validated) {
            $mail->to('amanullah310ab@gmail.com')
                 ->subject($validated['subject'] ?? 'Contact Form Message');
        });

        return back()->with('success', 'Your message has been sent!');
    }
}