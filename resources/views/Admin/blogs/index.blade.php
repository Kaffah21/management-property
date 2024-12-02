@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold">List Blog</h3>
            <a href="{{ route('admin.blogs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                <i class="fas fa-plus mr-2"></i> Add Blog
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($blogs as $index => $blog)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 + ($blogs->currentPage() - 1) * $blogs->perPage() }}</td>
                        
                        <!-- Menampilkan Gambar -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="w-16 h-16 object-cover " style="border-radius: 4px">
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">{{ $blog->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $blog->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap flex space-x-4">
                            <div class="relative group">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center">
                                    <i class="fas fa-pencil-alt"></i>
                                    <span class="absolute left-1/2 transform -translate-x-1/2 -mt-10 w-max bg-gray-800 text-white text-xs rounded-md p-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200">Edit</span>
                                </a>
                            </div>
                            <div class="relative group">
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline">
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
            
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
