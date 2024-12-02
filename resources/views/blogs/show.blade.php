@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 md:p-12 max-w-4xl">
        <!-- Blog Title -->
        <h1 class="text-4xl  text-gray-800 mb-4">{{ $blog->title }}</h1>
        
        <!-- Blog Date -->
        <p class="text-gray-500 text-lg mb-6">{{ $blog->date }}</p>
        
        <!-- Blog Image -->
        <div class="mb-8">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="Gambar Blog" class="w-full h-72 object-cover rounded-lg shadow-lg">
        </div>
        
        <!-- Blog Content -->
        <div class="prose prose-lg mb-8 text-gray-700">
            {!! $blog->content !!}
        </div>
        
        <!-- Back Button -->
        <a href="{{ route('blogs.index') }}" class="inline-block bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">
             Back to blog
        </a>
    </div>
@endsection
