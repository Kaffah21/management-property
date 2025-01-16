@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 md:p-12">
    <!-- Page Title -->
    <h1 class="text-2xl font-bold  text-gray-900 mb-10 text-center">Blog</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($blogs as $blog)
        <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl duration-300">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="Gambar Blog" class="w-full h-56 object-cover mb-4 transition-transform duration-500 hover:scale-110">
            
            <div class="px-6 py-4">
                <a href="{{ route('blogs.show', $blog->id) }}" class="block text-2xl font-semibold text-gray-800 hover:text-green-600 mb-2 transition duration-300 ease-in-out">
                    {{ $blog->title }}
                </a>

               
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
