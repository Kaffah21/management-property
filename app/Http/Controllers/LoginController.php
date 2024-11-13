<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

//login unduk admin
class LoginController extends Controller
{
    public function Login()
    {
        if (Auth::check()) {
            return redirect('master');
        } else {
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            return redirect('master');
        } else {
            session()->flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function showProfile()
    {
        $user = Auth::user(); // Fetch the authenticated user

        if ($user) {
            return view('profile', ['user' => $user]);
        } else {
            return redirect('/login')->with('error', 'Please login first.');
        }
    }
}
