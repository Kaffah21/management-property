@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-6">Payment History</h2>

    @if($transactions->isEmpty())
        <p class="text-gray-500">No transactions </p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($transactions as $transaction)
                <div class="bg-white shadow-md rounded-lg p-4 border">
                    <h3 class="text-lg font-semibold mb-2">{{ $transaction->villa->name }}</h3>
                    <p class="text-gray-600"><strong>Order ID:</strong> {{ $transaction->order_id }}</p>
                    <p class="text-gray-600"><strong>Customer:</strong> {{ $transaction->user_name }}</p>
                    <p class="text-gray-600"><strong>Guests:</strong> {{ $transaction->guests }}</p>
                    <p class="text-gray-600"><strong>Check-in:</strong> {{ $transaction->check_in }}</p>
                    <p class="text-gray-600"><strong>Check-out:</strong> {{ $transaction->check_out }}</p>
                    <p class="text-gray-600"><strong>Total Price:</strong> Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</p>

                    <p class="text-sm">
                        <strong>Status:</strong> 
                        <span class="text-{{ $transaction->payment_status == 'success' ? 'green' : ($transaction->payment_status == 'pending' ? 'yellow' : 'red') }}-500">
                            {{ ucfirst($transaction->payment_status) }}
                        </span>
                    </p>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $transactions->links() }} <!-- Pagination links -->
        </div>
    @endif
</div>
@endsection
