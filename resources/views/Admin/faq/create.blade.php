@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h3 class="text-xl font-semibold">Add New FAQ</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.faq.store') }}" method="POST">
                @csrf
                <div id="faq-container">
                    <div class="faq-form mb-5">
                        <div class="mb-5">
                            <label for="question" class="block text-gray-700 font-semibold mb-2">Question</label>
                            <input type="text" name="question[]" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('question') border-red-500 @enderror" 
                                   value="{{ old('question.0') }}" required>
                            @error('question.*')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="answer" class="block text-gray-700 font-semibold mb-2">Answer</label>
                            <textarea name="answer[]" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md @error('answer') border-red-500 @enderror" required>{{ old('answer.0') }}</textarea>
                            @error('answer.*')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-5">
                    <a href="{{ route('admin.faq.index') }}" 
                       class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save FAQ</button>
                    <button type="button" id="add-faq" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">                  
                          <i class="fas fa-plus fs-2 mr-2"></i> Add Coloum
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-faq').addEventListener('click', function() {
        // Menambahkan formulir FAQ baru
        const faqContainer = document.getElementById('faq-container');
        const faqForm = document.createElement('div');
        faqForm.classList.add('faq-form', 'mb-5');
        
        faqForm.innerHTML = `
            <div class="mb-5">
                <label for="question" class="block text-gray-700 font-semibold mb-2">Question</label>
                <input type="text" name="question[]" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-5">
                <label for="answer" class="block text-gray-700 font-semibold mb-2">Answer</label>
                <textarea name="answer[]" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md" required></textarea>
            </div>
        `;
        
        faqContainer.appendChild(faqForm);
    });
</script>
@endsection
