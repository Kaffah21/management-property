<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123123123'), // Ganti 'password' dengan kata sandi yang Anda inginkan
            'role' => 'admin',
        ]);
    }
}
