@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold text-gray-700 mb-4">Selamat Datang, Admin</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Card 1: Properti Rumah -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Properti Rumah</h2>
            <p class="text-gray-600">Kelola data properti rumah di sini.</p>
            <a href="#" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">Lihat Properti Rumah</a>
        </div>

        <!-- Card 2: Properti Villa -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Properti Villa</h2>
            <p class="text-gray-600">Kelola data properti villa di sini.</p>
            <a href="#" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">Lihat Properti Villa</a>
        </div>

        <!-- Card 3: Pengguna -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Pengguna</h2>
            <p class="text-gray-600">Kelola data pengguna di sini.</p>
            <a href="#" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">Lihat Pengguna</a>
        </div>
    </div>
@endsection
