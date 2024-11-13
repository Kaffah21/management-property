@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold">List Tenants</h3>
            <a href="{{ route('admin.penyewa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                <i class="fas fa-plus fs-2 mr-2"></i> Add Tenants
            </a>
        </div>
        <div class="p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adress</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($penyewa as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-4">
                            <div class="relative group">
                                <a href="{{ route('admin.penyewa.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center" aria-label="Edit Penyewa">
                                    <i class="fas fa-pencil-alt fs-2"></i>
                                    <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Edit</span>
                                </a>
                            </div>
                            <div class="relative group">
                                <form action="{{ route('admin.penyewa.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center" onclick="return confirm('Yakin ingin menghapus?')" aria-label="Hapus Penyewa">
                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                        <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
