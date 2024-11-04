@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Gambar rumah -->
        <img src="{{ Storage::url('rumah/'.$rumah->gambar) }}" class="w-full h-64 object-cover" alt="{{ $rumah->nama }}">

        <!-- Detail rumah -->
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $rumah->nama }}</h2>
            <p class="text-gray-600 mb-4">
                <i class="fas fa-map-marker-alt text-red-500"></i> {{ $rumah->lokasi }}<br>
                <i class="fas fa-star text-yellow-400"></i> {{ $rumah->rating }}/5<br>
                <span class="text-lg font-semibold text-blue-600">Rp {{ number_format($rumah->harga) }} / malam</span>
            </p>

            <h4 class="text-xl font-semibold text-gray-700 mt-6 mb-2">Deskripsi</h4>
            <p class="text-gray-600 mb-6">{{ $rumah->deskripsi }}</p>

            <!-- Tombol Kembali -->
            <a href="{{ route('rumahs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
