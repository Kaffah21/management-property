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
        // Validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Data untuk email
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'messageContent' => $request->input('message'),
        ];

        // Kirim email
        Mail::send('emails.contact_us', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']); // Set 'from' dengan email pengirim
            $message->to('silmikaffahkaffah25@gmail.com') 
                    ->subject('New Contact Message');
        });

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
