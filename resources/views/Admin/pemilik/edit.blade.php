@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold">Edit pemilik</h3>
        </div>
        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.pemilik.update', $pemilik->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $pemilik->name) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('name') border-red-500 @enderror" 
                           required>
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" 
                           value="{{ old('email', $pemilik->email) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('email') border-red-500 @enderror" 
                           required>
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" 
                           value="{{ old('phone', $pemilik->phone) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('phone') border-red-500 @enderror" 
                           required>
                    @error('phone')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                    <input type="text" name="address" id="address" 
                           value="{{ old('address', $pemilik->address) }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('address') border-red-500 @enderror" 
                           required>
                    @error('address')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between mt-5">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                    <a href="{{ route('admin.pemilik.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
