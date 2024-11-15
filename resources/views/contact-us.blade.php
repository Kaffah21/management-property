@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-lg flex flex-col lg:flex-row">
        <!-- Left Column: Contact Info & Social Links -->
        <div class="lg:w-1/3 mb-8 lg:mb-0 flex flex-col items-center justify-center">
            <img src="/assets/Contact us.svg" alt="Contact Us Image" class="w-3/4 rounded-lg mb-6">
            
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Get in Touch</h2>
            <div class="space-y-4">
                <a href="tel:+62 987987297" class="flex items-center text-gray-600 hover:text-green-500">
                    <i class="fas fa-phone-alt text-xl mr-2"></i> <span>+62 987987297</span>
                </a>
                <a href="mailto:kaffahsilmi217@gmail.com" class="flex items-center text-gray-600 hover:text-green-700">
                    <i class="fa fa-envelope text-xl mr-2"></i> kaffahsilmi217@gmail.com
                </a>
                <a href="https://twitter.com" target="_blank" class="flex items-center text-gray-600 hover:text-blue-500">
                    <i class="fab fa-twitter text-xl mr-2"></i> @Management
                </a>
                <a href="https://instagram.com" target="_blank" class="flex items-center text-gray-600 hover:text-pink-500">
                    <i class="fab fa-instagram text-xl mr-2"></i> @kffh_217
                </a>
            </div>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="lg:w-2/3 lg:pl-10">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center lg:text-left">Contact Us</h1>
            <p class="text-gray-600 text-center lg:text-left mb-8">Interested in joining our property management team? Fill out the form below, and we'll get back to you!</p>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-3" rows="4"></textarea>
                </div>
                
                <button type="submit"  class="w-full py-3 rounded-md border border-green-500 text-white bg-green-500 hover:bg-green-600 transition duration-300">
                    Submit 
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
