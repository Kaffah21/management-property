@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
    

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Informasi tentang perusahaan -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<div class="p-6 text-gray-900">
    <div class="flex flex-col md:flex-row">
        <!-- Foto -->
        <div class="md:w-1/3 mb-4 md:mb-0">
            <img src="assets/villa.jpg" alt="Foto Perusahaan" class="w-full h-auto rounded-md shadow-md">
        </div>

        <!-- Deskripsi dan Lokasi -->
        <div class="md:w-2/3 md:pl-6">
            <h3 class="text-lg font-semibold mb-2">Deskripsi Perusahaan</h3>
            <p class="mb-4">
                Kami adalah perusahaan yang spesialis dalam pengelolaan penyewaan properti. Dengan pengalaman bertahun-tahun di industri ini, kami menyediakan layanan menyeluruh untuk pemilik properti dan penyewa, termasuk manajemen properti, pemasaran, dan layanan pelanggan. Tujuan kami adalah untuk memastikan pengalaman penyewaan yang lancar dan efisien untuk semua pihak yang terlibat.                </p>

            <h4 class="text-md font-semibold mb-1">Lokasi Kami</h4>
            <p>
                Jl. Teknologi No. 123,<br>
                Jakarta, Indonesia
            </p>

            <p>
                Telepon: <a href="https://wa.me/62812220381892" class="text-blue-500 hover:underline">+62 8122-2038-1892</a>
            </p>
        </div>
    </div>
</div>

{{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-semibold mb-4">Kirim Komentar</h3>

        <!-- Menampilkan Pesan Sukses atau Error -->
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Ada masalah!</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('comments.store') }}">
            @csrf

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" name="name" type="text" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan nama Anda">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan email Anda">
                </div>

                <div>
                    <label for="comment" class="block text-sm font-medium text-gray-700">Komentar</label>
                    <textarea id="comment" name="comment" rows="4" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Masukkan komentar Anda"></textarea>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Kirim Komentar</button>
                </div>
            </div>
        </form>
    </div>
</div> --}}
</div>
</div>
</div>
@endsection