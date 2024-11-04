@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold">List Villa</h3>
            <a href="{{ route('admin.villas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                <i class="fas fa-plus mr-2"></i> Add villa
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($villas as $villa)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"><img src="{{ Storage::url('villas/'.$villa->gambar) }}" width="100"></td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $villa->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($villa->harga) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $villa->lokasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $villa->rating }}/5</td>
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-4">
                            <div class="relative group">
                                <a href="{{ route('admin.villas.edit', $villa) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center">
                                    <i class="fas fa-edit"></i>
                                    <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Edit</span>
                                </a>
                            </div>
                            <div class="relative group">
                                <form action="{{ route('admin.villas.destroy', $villa) }}" method="POST" class="inline">
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
            {{ $villas->links() }}
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
