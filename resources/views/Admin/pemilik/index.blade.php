@extends('layouts.admin')

@section('content')

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">List owner</h3>
            <a href="{{ route('admin.pemilik.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                <i class="fas fa-plus mr-2"></i> Add Owner
            </a>
        </div>
        <div class="p-6">
            <table class="min-w-full bg-white divide-y divide-gray-200 rounded-lg shadow-sm">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">Adress</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($pemilik as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $item->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $item->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $item->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $item->address }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-4">
                            <div class="relative group">
                                <a href="{{ route('admin.pemilik.edit', $item->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-500 flex items-center" aria-label="Edit Villa">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                    <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Edit</span>
                                </a>
                            </div>
                            <div class="relative group">
                                <form action="{{ route('admin.pemilik.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-500 flex items-center" onclick="return confirm('Yakin ingin menghapus?')" aria-label="Hapus Villa">
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

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
