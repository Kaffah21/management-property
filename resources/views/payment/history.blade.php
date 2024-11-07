@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-center mb-6">Riwayat Transaksi</h2>

    @if($transactions->isEmpty())
        <p class="text-center text-gray-500">Anda belum memiliki riwayat transaksi.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left text-sm text-gray-600">Tanggal</th>
                    <th class="py-2 px-4 border-b text-left text-sm text-gray-600">Villa</th>
                    <th class="py-2 px-4 border-b text-left text-sm text-gray-600">Total Harga</th>
                    <th class="py-2 px-4 border-b text-left text-sm text-gray-600">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $transaction->created_at->format('d M Y') }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-600">{{ $transaction->villa->nama }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-600">Rp {{ number_format($transaction->total_price) }}</td>
                        <td class="py-2 px-4 border-b text-sm text-gray-600">
                            <span class="px-4 py-2 rounded-full {{ $transaction->status == 'success' ? 'bg-green-500 text-white' : ($transaction->status == 'pending' ? 'bg-yellow-500 text-white' : 'bg-red-500 text-white') }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
