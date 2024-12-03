@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold">Edit Property</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.rumah.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->

                <div class="mb-5">
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" id="nama" name="nama" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('nama') border-red-500 @enderror" 
                           value="{{ old('nama', $property->nama) }}">
                    @error('nama')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="harga" class="block text-gray-700 font-semibold mb-2">Price</label>
                    <input type="number" id="harga" name="harga" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('harga') border-red-500 @enderror" 
                           value="{{ old('harga', $property->harga) }}">
                    @error('harga')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="lokasi" class="block text-gray-700 font-semibold mb-2">Location</label>
                    <input type="text" id="lokasi" name="lokasi" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('lokasi') border-red-500 @enderror" 
                           value="{{ old('lokasi', $property->lokasi) }}">
                    @error('lokasi')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="rating" class="block text-gray-700 font-semibold mb-2">Rating</label>
                    <input type="number" id="rating" name="rating" step="0.1" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('rating') border-red-500 @enderror" 
                           value="{{ old('rating', $property->rating) }}">
                    @error('rating')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="deskripsi-editor" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="deskripsi" id="deskripsi-editor" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-md @error('deskripsi') border-red-500 @enderror">{{ old('deskripsi', $property->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">Image</label>
                    <div class="relative w-full">
                        <input type="file" name="gambar" id="uploadImage" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md opacity-0 absolute top-0 left-0 cursor-pointer">
                        <div id="previewContainer" 
                             class="flex items-center justify-center w-full h-48 border-2 border-dashed border-gray-300 rounded-md bg-gray-100">
                            <img id="previewImage" src="{{ asset('storage/' . $property->gambar) }}" class="w-full h-full object-cover rounded-md">
                            <span id="uploadText" class="absolute text-gray-500 hidden">Click to upload an image</span>
                        </div>
                    </div>
                    @error('gambar')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-between mt-5">
                    <a href="{{ route('admin.rumah.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
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


        const uploadInput = document.getElementById('uploadImage');
    const previewImage = document.getElementById('previewImage');
    const uploadText = document.getElementById('uploadText');

    uploadInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
                uploadText.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
