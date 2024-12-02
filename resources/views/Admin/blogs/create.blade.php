@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">Tambah Blog</h1>
           
        </div>
        <div class="p-6">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" name="title" id="title" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('title') border-red-500 @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                    <input type="date" name="date" id="date" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('date') border-red-500 @enderror" 
                           value="{{ old('date') }}" required>
                    @error('date')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
                    <input type="file" name="image" id="image" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md @error('image') border-red-500 @enderror">
                    @error('image')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea name="content" id="content" rows="5" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-md @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between mt-5">
                    <a href="{{ route('admin.blogs.index') }}" 
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 flex items-center relative group">
                   Back
                 </a>
                    <button type="submit" 
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 relative group flex items-center">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
