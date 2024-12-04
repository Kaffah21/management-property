@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold">List Home</h3>
            <a href="{{ route('admin.rumah.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                <i class="fas fa-plus mr-2"></i> Add 
            </a>
        </div>
        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">{{ session('success') }}</div>
            @endif
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($rumahs as $index => $rumah)
                    <tr>
                        <!-- Adjust the "No" column to account for pagination -->
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $index + 1 + ($rumahs->currentPage() - 1) * $rumahs->perPage() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700"><img src="{{ Storage::url('rumah/'.$rumah->gambar) }}" width="100" style="border-radius: 4px"></td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $rumah->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">Rp {{ number_format($rumah->harga) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $rumah->lokasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $rumah->rating }}/5</td>
                        <td class="px-6 py-4 whitespace-nowrap  flex space-x-4">
                            <div class="relative group">
                                <a href="{{ route('admin.rumah.edit', $rumah) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center">
                                    <i class="fas fa-pencil-alt fs-2"></i>
                                    <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Edit</span>
                                </a>
                            </div>
                            <div class="relative group">
                                <form action="{{ route('admin.rumah.destroy', $rumah) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                        <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    {{-- pagination --}}
            <div>
                {{ $rumahs->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
