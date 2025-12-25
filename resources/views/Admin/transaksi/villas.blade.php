@extends('layouts.admin')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-6">Payment History</h2>

    @if($transactions->isEmpty())
        <p class="text-gray-500">No transactions </p>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 p-4 flex justify-between items-center">
                <h3 class="text-xl font-semibold">Transactions</h3>
            </div>

            <div class="p-6">
                <table class="table-auto w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Villa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guests</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check-in</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check-out</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($transactions as $index => $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->villa->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->order_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->user_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->guests }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->check_in }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->check_out }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium 
                                        @if($transaction->payment_status === 'success') bg-green-200 text-green-800 
                                        @elseif($transaction->payment_status === 'pending') bg-yellow-200 text-yellow-800 
                                        @else bg-red-200 text-red-800 
                                        @endif">
                                        {{ ucfirst($transaction->payment_status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $transactions->links() }} <!-- Pagination links -->
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
