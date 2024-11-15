@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')

@if (session('success'))
    <div class="bg-green-100 text-green-700 border border-green-400 p-4 rounded-lg mb-6 shadow-md">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-center py-8">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3 bg-white p-8 shadow-lg rounded-xl">
        @csrf
        
        <!-- Profile Section -->
        <div class="flex items-center justify-center mb-6">
            <div class="relative">
                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : 'https://via.placeholder.com/100' }}"
                    alt="Profile Photo" class="w-24 h-24 object-cover rounded-full border-4 border-gray-100">
                <label for="profile_photo" class="absolute bottom-0 right-0 bg-gray-400 text-white p-2 rounded-full cursor-pointer">
                    <i class="fas fa-camera"></i>
                </label>
                <input type="file" name="profile_photo" accept="image/*" id="profile_photo" class="hidden">
            </div>
        </div>

        <!-- Name Field -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <!-- Email Field -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <!-- Password Fields -->
        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-semibold mb-2">New Password (optional)</label>
            <input type="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        <!-- Profile Photo Delete Option -->
        <div class="flex items-center mb-6 space-x-4">
            <label for="delete_photo" class="flex items-center text-gray-700 font-semibold">
                <input type="checkbox" name="delete_photo" id="delete_photo" class="form-checkbox text-indigo-500" {{ old('delete_photo') ? 'checked' : '' }}>
                <span class="ml-2">Delete Profile Photo</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-md hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Update Profile
        </button>
    </form>
</div>

@endsection

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
