@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold">Add New Penyewa</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.penyewa.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" name="name" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('name') border-red-500 @enderror" 
                           value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('email') border-red-500 @enderror" 
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Phone</label>
                    <input type="text" name="phone" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('phone') border-red-500 @enderror" 
                           value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Address</label>
                    <input type="text" name="address" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('address') border-red-500 @enderror" 
                           value="{{ old('address') }}">
                    @error('address')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between mt-5">
                    <a href="{{ route('admin.penyewa.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
