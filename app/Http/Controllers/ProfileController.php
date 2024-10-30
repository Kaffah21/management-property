<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:6|confirmed',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Dapatkan pengguna yang sedang login
    $user = Auth::user();

    // Update nama dan email
    $user->name = $request->name;
    $user->email = $request->email;

    // Jika password diisi, maka update password
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // Tangani upload foto profil
    if ($request->hasFile('profile_photo')) {
        // Hapus foto lama jika ada
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }
        // Simpan foto baru
        $path = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo = $path;
    }

    // Simpan perubahan ke database
    $user->save();

    // Redirect ke halaman master dengan pesan sukses
    return redirect()->route('master')->with('success', 'Profile updated successfully!');
}
    
}
