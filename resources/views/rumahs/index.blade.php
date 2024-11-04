@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<style>
    /* Animasi mengetik */
    @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }
    @keyframes blink-caret {
        50% { border-color: transparent; }
    }
    .typing-effect {
        overflow: hidden;
        border-right: .15em solid rgb(97, 95, 91);
        white-space: nowrap;
        animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
    }
</style>
<div class="container mx-auto px-4 py-8">
    <!-- Animasi teks sambutan -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-black typing-effect ">Selamat Datang di Villa Kami!</h1>
        <p class="mt-4 text-gray-700 text-lg max-w-2xl mx-auto">
            Temukan villa impian Anda di destinasi terbaik. Kami menawarkan pengalaman menginap yang tak terlupakan dengan fasilitas mewah dan pemandangan menakjubkan. Jelajahi berbagai pilihan villa kami dan rasakan kenyamanan yang sempurna.
        </p>
    </div>

    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-semibold mb-6">Daftar Villa</h2>

        <!-- Grid container -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($rumahs as $rumah)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="{{ Storage::url('rumah/'.$rumah->gambar) }}" class="w-full h-48 object-cover" alt="{{ $rumah->nama }}">
                <div class="p-6">
                    <h5 class="text-lg font-bold mb-2">{{ $rumah->nama }}</h5>
                    <p class="text-gray-600 text-sm mb-4">
                        <i class="fas fa-map-marker-alt text-red-500"></i> {{ $rumah->lokasi }}<br>
                        <i class="fas fa-star text-yellow-400"></i> {{ $rumah->rating }}/5<br>
                        <span class="font-semibold text-lg text-gray-800">Rp {{ number_format($rumah->harga) }} / malam</span>
                    </p>
                    <a href="{{ route('rumahs.show', $rumah) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $rumahs->links() }}
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
