<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact-us'); 
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        // Kirim email
        Mail::send(new ContactUsMailable($request->name, $request->email, $request->message));

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim.');
    }
}
