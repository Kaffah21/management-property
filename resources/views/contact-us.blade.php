<!-- resources/views/contact-us.blade.php -->
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-8">
    <h1 class="text-2xl font-bold text-center mb-4">Contact Us</h1>
    <p class="text-center mb-8">Interested in joining our property management team? Fill out the form below, and we'll get back to you!</p>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea name="message" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" rows="4"></textarea>
        </div>
        
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-md">
            Submit 
        </button>
    </form>
</div>
@endsection
