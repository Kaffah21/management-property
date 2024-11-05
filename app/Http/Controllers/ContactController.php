<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact-us'); 
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::send('emails.contact-request', $details, function($message) use ($details) {
            $message->to('kaffahsilmi217@gmail.com') 
                    ->subject('New Contact Request');
            $message->from($details['email'], $details['name']);
        });

        return back()->with('success', 'Pesan terkirim, permintaan anda akan kami proses');
    }
}
