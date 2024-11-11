@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">History Transaction</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
        @forelse ($transactions as $transaction)
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $transaction->property->name }}</h3>
            <p class="text-gray-500 mb-4">{{ $transaction->property->location }}</p>
            
            <div class="text-lg text-green-600 font-semibold mb-4">
                Rp {{ number_format($transaction->total_price) }}
            </div>
            
            <div class="mb-4">
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    @if($transaction->status === 'completed') bg-green-200 text-green-800 
                    @elseif($transaction->status === 'pending') bg-yellow-200 text-yellow-800 
                    @else bg-red-200 text-red-800 
                    @endif">
                    {{ ucfirst($transaction->status) }}
                </span>
            </div>
            
            <p class="text-gray-500 text-sm">{{ $transaction->created_at->format('d-m-Y') }}</p>
        </div>
        @empty
        <div class="col-span-1 sm:col-span-2 md:col-span-3 text-center">
            <p class="text-gray-500 text-lg">Belum ada transaksi</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
