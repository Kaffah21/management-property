@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold">Add Property</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.rumah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" name="nama" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('nama') border-red-500 @enderror" 
                           value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Price</label>
                    <input type="number" name="harga" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('harga') border-red-500 @enderror" 
                           value="{{ old('harga') }}">
                    @error('harga')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Location</label>
                    <input type="text" name="lokasi" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('lokasi') border-red-500 @enderror" 
                           value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Rating</label>
                    <input type="number" step="0.1" name="rating" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('rating') border-red-500 @enderror" 
                           value="{{ old('rating') }}">
                    @error('rating')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="deskripsi" id="deskripsi-editor"
                              class="w-full px-4 py-2 border border-gray-300 rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Image</label>
                    <input type="file" name="gambar" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('gambar') border-red-500 @enderror">
                    @error('gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between mt-5">
                    <a href="{{ route('admin.rumah.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#deskripsi-editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
