@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 p-4 flex justify-between items-center">
                <h3 class="text-xl font-semibold">All Transactions</h3>
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                    <i class="fas fa-arrow-left fs-2 mr-2"></i> Back to Dashboard
                </a>
            </div>
            <div class="p-6">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table-auto w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($transactions as $index => $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->rumah->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($transaction->total_price) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium 
                                        @if($transaction->status === 'completed') bg-green-200 text-green-800 
                                        @elseif($transaction->status === 'pending') bg-yellow-200 text-yellow-800 
                                        @else bg-red-200 text-red-800 
                                        @endif">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $transaction->created_at->format('d-m-Y') }}</td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                    <a href="{{ route('admin.transaksi.edit', $transaction) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-pencil-alt fs-2"></i>
                                    </a>
                                    <form action="{{ route('admin.transaksi.destroy', $transaction) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this transaction?')">
                                            <i class="fas fa-trash fs-2"></i>
                                        </button>
                                    </form>
                                </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div>
                    {{ $transactions->links() }}
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
