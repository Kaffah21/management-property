@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-12 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 md:w-2/3 lg:w-1/2">
        <div class="text-center mb-6">
            <!-- Success Icon -->
            <div class="flex justify-center items-center mb-4">
                <div class="bg-green-100 rounded-full p-4">
                    <i class="fas fa-check-circle text-green-500 text-5xl"></i>
                </div>
            </div>
            <h2 class="text-3xl font-semibold text-green-600">Pembayaran Berhasil!</h2>
            <p class="mt-2 text-gray-600">Terima kasih atas transaksi Anda. Pembayaran Anda telah berhasil diproses.</p>
        </div>

        <!-- Transaction Details -->
        <div class="bg-gray-100 p-6 rounded-lg mb-6">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Detail Transaksi</h3>
            <ul class="space-y-2">
                <li class="flex justify-between text-gray-700">
                    <span class="font-semibold">Nomor Pesanan:</span>
                    <span>#12345678</span>
                </li>
                <li class="flex justify-between text-gray-700">
                    <span class="font-semibold">Nama Properti:</span>
                    {{-- <span>{{ $transaction->villa->nama  }}</span> --}}
                </li>
                <li class="flex justify-between text-gray-700">
                    <span class="font-semibold">Check-in:</span>
                    {{-- <span>{{ $transaction->created_at->format('d M Y') }}</span> --}}
                </li>
                <li class="flex justify-between text-gray-700">
                    <span class="font-semibold">Check-out:</span>
                    {{-- <span>{{ $checkOutDate }}</span> --}}
                </li>
                <li class="flex justify-between text-gray-700">
                    <span class="font-semibold">Total Harga:</span>
                    {{-- <span class="text-green-600 font-semibold">Rp {{ number_format($totalPrice) }}</span> --}}
                </li>
            </ul>
        </div>

        <!-- Call to Action Buttons -->
        <div class="flex justify-center space-x-4">
            <a href="{{ route('master') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                Kembali ke Beranda
            </a>
            <a href="{{ route('payment.history') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out">
                Lihat Pesanan Saya
            </a>
        </div>
    </div>
</div>

@endsection
