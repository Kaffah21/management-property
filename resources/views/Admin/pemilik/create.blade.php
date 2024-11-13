@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold">Add New Pemilik</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.pemilik.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" name="name" id="name" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('name') border-red-500 @enderror">
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" name="email" id="email" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('email') border-red-500 @enderror">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                    <input type="text" name="address" id="address" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('address') border-red-500 @enderror">
                    @error('address')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between mt-5">
                    <a href="{{ route('admin.pemilik.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
