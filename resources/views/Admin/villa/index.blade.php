@extends('layouts.admin')

@section('header')
    Add New Property
@endsection

@section('content')
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="" 
                  method="POST" 
                  enctype="multipart/form-data" 
                  class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Property Name
                    </label>
                    <input type="text" 
                           name="name" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Price
                    </label>
                    <input type="number" 
                           name="price" 
                           step="0.01" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Rating
                    </label>
                    <input type="number" 
                           name="rating" 
                           step="0.1" 
                           min="0" 
                           max="5" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Image
                    </label>
                    <input type="file" 
                           name="image" 
                           class="mt-1 block w-full">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Description
                    </label>
                    <textarea name="description" 
                              rows="4" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Type
                    </label>
                    <select name="type" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="house">House</option>
                        <option value="villa">Villa</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Property
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection