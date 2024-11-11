<!-- resources/views/contact-us.blade.php -->
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-8 flex flex-col md:flex-row">
    <!-- Left Column: Image and Social Icons -->
    <div class="md:w-1/3 mb-6 md:mb-0 flex flex-col items-center justify-center">
        <!-- Placeholder Image -->
        <img src="/assets/Contact us.svg" alt="Contact Image" class="w-3/4 rounded-lg mb-6">
        
        <!-- Social Icons -->
        <div class="flex flex-col items-center space-y-4">
            <a href="tel:+62 987987297" class="flex items-center text-gray-600 hover:text-blue-500">
                <i class="fas fa-phone-alt text-xl mr-2"></i> <span>+62 987987297</span>
            </a>
            <a href="https://twitter.com" target="_blank" class="flex items-center text-gray-600 hover:text-blue-500">
                <i class="fab fa-twitter text-xl mr-2"></i> <span>@IDH</span>
            </a>
            <a href="https://instagram.com" target="_blank" class="flex items-center text-gray-600 hover:text-pink-500">
                <i class="fab fa-instagram text-xl mr-2"></i> <span>@kffh_217</span>
            </a>
        </div>
    </div>

    <!-- Right Column: Contact Form -->
    <div class="md:w-2/3 md:pl-8">
        <h1 class="text-2xl font-bold text-center md:text-left mb-4">Contact Us</h1>
        <p class="text-center md:text-left mb-8">Interested in joining our property management team? Fill out the form below, and we'll get back to you!</p>
        
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
            
            <button type="submit"  class="w-full py-2 rounded-md border transition duration-300"
            style="background-color: white; color: #049484; border: 1px solid #049484;"
            onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
            onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">
                Submit 
            </button>
        </form>
    </div>
</div>
@endsection
