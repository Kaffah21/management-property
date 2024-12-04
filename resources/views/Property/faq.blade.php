@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-4xl font-semibold text-center mb-8">Frequently Asked Questions (FAQ)</h1>

        @if($faqs->isEmpty())
            <p>No FAQs available at the moment.</p>
        @else
            @foreach ($faqs as $faq)
                <div class="mb-4 border-b">
                    <!-- Accordion Button (Question) -->
                    <button id="faq-{{ $faq->id }}" class="w-full text-left py-4 px-6 bg-gray-100 hover:bg-gray-200 focus:outline-none flex items-center justify-between">
                        <span class="font-semibold text-xl">{{ $faq->question }}</span>
                        <i class="fas fa-plus ml-auto"></i> <!-- Icon moved to the right -->
                    </button>

                    <!-- Accordion Answer (Initially Hidden) -->
                    <div id="faq-{{ $faq->id }}-answer" class="hidden px-6 py-4 bg-gray-50 text-gray-700">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Script for Accordion Functionality -->
    <script>
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function () {
                const answer = document.getElementById(button.id + '-answer');
                const isVisible = answer.classList.contains('hidden');

                // Toggle visibility of the accordion answer
                answer.classList.toggle('hidden', !isVisible);
                
                // Toggle the icon between plus and minus
                const icon = button.querySelector('i');
                if (isVisible) {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                } else {
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                }
            });
        });
    </script>
@endsection
