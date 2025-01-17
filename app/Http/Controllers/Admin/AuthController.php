<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rumah;
use App\Models\RumahTransaction;
use App\Models\User;
use App\Models\Villa;
use App\Models\VillaTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'incorrect email or password'])->withInput();
    }

    // Dashboard
    public function dashboard()
    {
        $totalVilla = Villa::count(); 
        $totalRumah = Rumah::count();
        $totalUser = User::count();
        $totalRTransaction = RumahTransaction::count();
        $totalVTransaction = VillaTransaction::count();
        $totalTransaction = $totalRTransaction + $totalVTransaction ;


        return view('admin.dashboard', compact('totalVilla','totalRumah','totalUser','totalTransaction'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('status', 'Logged out successfully');
    }
}
