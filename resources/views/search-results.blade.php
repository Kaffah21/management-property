@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Hasil Pencarian untuk "{{ $query }}"</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($rumahs as $rumah)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="{{ Storage::url('rumah/'.$rumah->gambar) }}" class="w-full h-48 object-cover" alt="{{ $rumah->nama }}">
                <div class="p-6">
                    <h5 class="text-lg font-bold mb-2">{{ $rumah->nama }}</h5>
                    <p class="text-gray-600 text-sm mb-4">
                        <i class="fas fa-map-marker-alt text-red-500"></i> {{ $rumah->lokasi }}<br>
                        <span class="font-semibold text-lg text-gray-800">Rp {{ number_format($rumah->harga) }} / malam</span>
                    </p>
                    <a href="{{ route('rumahs.show', $rumah) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Lihat Detail</a>
                </div>
            </div>
        @empty
            <p class="text-center col-span-3">Tidak ada hasil untuk pencarian "{{ $query }}"</p>
        @endforelse

        @foreach($villas as $villa)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="{{ Storage::url('villas/'.$villa->gambar) }}" class="w-full h-48 object-cover" alt="{{ $villa->nama }}">
                <div class="p-6">
                    <h5 class="text-lg font-bold mb-2">{{ $villa->nama }}</h5>
                    <p class="text-gray-600 text-sm mb-4">
                        <i class="fas fa-map-marker-alt text-red-500"></i> {{ $villa->lokasi }}<br>
                        <span class="font-semibold text-lg text-gray-800">Rp {{ number_format($villa->harga) }} / malam</span>
                    </p>
                    <a href="{{ route('villas.show', $villa) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
