@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-4xl font-semibold text-center mb-8">Frequently Asked Questions (FAQ)</h1>

        <div class="space-y-4">
            <!-- Accordion Item 1 -->
            <div class="border-b border-gray-200">
                <button id="faq1" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                    What is house and villa rental on our platform?
                </button>
                <div id="faq1-answer" class="px-6 py-4 text-gray-600 hidden">
                    We provide house and villa rental services for vacations or long-term stays. You can search for properties based on location, price, and amenities that meet your needs.
                </div>
            </div>

            <!-- Accordion Item 2 -->
            <div class="border-b border-gray-200">
                <button id="faq2" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                    How do I book a house or villa?
                </button>
                <div id="faq2-answer" class="px-6 py-4 text-gray-600 hidden">
                    You can book a house or villa through the property detail page by selecting your desired dates and making a payment using the available payment methods.
                </div>
            </div>

            <div class="border-b border-gray-200">
                <button id="faq4" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                    How do I contact customer support?
                </button>
                <div id="faq4-answer" class="px-6 py-4 text-gray-600 hidden">
                    You can contact our customer support via email or WhatsApp, which are available on our Contact Us page.
                </div>
            </div>

        </div>
    </div>

    <!-- Script for Accordion Functionality -->
    <script>
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function () {
                const answer = document.getElementById(button.id + '-answer');
                const isVisible = answer.classList.contains('hidden');
                
                // Toggle visibility of the accordion answer
                answer.classList.toggle('hidden', !isVisible);
            });
        });
    </script>
@endsection
