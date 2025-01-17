@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@section('content')
<div class="py-12 bg-gray-50">
<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-semibold text-center text-black mb-8">Terms and Conditions</h1>

    <div class="space-y-6 text-lg text-gray-700">
        <p>
            By using our services, you agree to comply with the following terms and conditions. If you disagree with any of the conditions mentioned, please do not use our services.
        </p>

        <div x-data="{ open: null }">
            <div>
                <button @click="open !== 1 ? open = 1 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    1. Acceptance of Terms and Conditions
                </button>
                <div x-show="open === 1" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        By accessing or using our services, you agree to be bound by these terms and conditions. We reserve the right to update or change these terms and conditions at any time without prior notice.
                    </p>
                </div>
            </div>

            <div>
                <button @click="open !== 2 ? open = 2 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    2. Use of Service
                </button>
                <div x-show="open === 2" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        You agree to use our services only for lawful purposes and in accordance with applicable law. You are prohibited from using our services for illegal purposes or actions that may harm others.
                    </p>
                </div>
            </div>

            <div>
                <button @click="open !== 3 ? open = 3 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    3. Intellectual Property Rights
                </button>
                <div x-show="open === 3" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        All content on our platform, including text, images, logos, and other designs, are our property and protected by copyright. You are not permitted to copy, distribute, or modify such content without written permission from us.
                    </p>
                </div>
            </div>

            
            <div>
                <button @click="open !== 4 ? open = 4 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    4. Limitation of Liability
                </button>
                <div x-show="open === 4" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        We are not responsible for any loss or damage resulting from the use of our services, including but not limited to technical errors, system failures, or service interruptions.
                    </p>
                </div>
            </div>

            <div>
                <button @click="open !== 5 ? open = 5 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    5. Privacy Policy
                </button>
                <div x-show="open === 5" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        We respect your privacy. The personal data you provide to us will only be used in accordance with our separate Privacy Policy. We will not share your personal data with third parties without your permission.
                    </p>
                </div>
            </div>

            <div>
                <button @click="open !== 6 ? open = 6 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    6. Termination of Access
                </button>
                <div x-show="open === 6" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        We reserve the right to terminate your access to our services at any time if we believe you have violated these terms and conditions or if we need to perform system maintenance.
                    </p>
                </div>
            </div>

          
            <div>
                <button @click="open !== 7 ? open = 7 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    7. Changes to Terms and Conditions
                </button>
                <div x-show="open === 7" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        We may change these terms and conditions at any time. We will notify you of any changes through our website or email. These changes will be effective once posted on our website.
                    </p>
                </div>
            </div>

            <!-- Accordion Item 8 -->
            <div>
                <button @click="open !== 8 ? open = 8 : open = null" class="w-full text-left px-4 py-2 text-lg font-semibold text-black bg-white-200 rounded-md focus:outline-none">
                    8. Contact
                </button>
                <div x-show="open === 8" x-collapse class="px-4 py-2 text-gray-700">
                    <p>
                        If you have any questions regarding these terms and conditions, you can contact us via email or through our contact page.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
