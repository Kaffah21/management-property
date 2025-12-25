@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('title', 'Privacy Policy')

@section('content')
<div class="py-12 bg-gray-50">

<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-4xl font-semibold text-center mb-8">Privacy Policy</h1>

    <div class="space-y-4">
        <div class="border-b border-gray-200">
            <button id="faq1" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                Introduction            </button>
            <div id="faq1-answer" class="px-6 py-4 text-gray-600 hidden">
                Your privacy is important to us. This privacy policy explains how we collect, use, and protect your information when you use our platform.
            </div>
        </div>

        <div class="border-b border-gray-200">
            <button id="faq2" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                Information We Collect            </button>
            <div id="faq2-answer" class="px-6 py-4 text-gray-600 hidden">
                <ul class="list-disc list-inside text-gray-700 leading-relaxed">
                    <li>Personal Information: Name, email address, phone number, etc.</li>
                    <li>Usage Data: Browser type, IP address, pages visited, and other analytics.</li>
                    <li>Cookies: For improving user experience and website performance.</li>
                </ul>            </div>
        </div>

     
        <div class="border-b border-gray-200">
            <button id="faq4" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                How We Use Your Information            </button>
            <div id="faq4-answer" class="px-6 py-4 text-gray-600 hidden">
                <p class="text-gray-700 leading-relaxed">
                    We use your information to:
                </p>
                <ul class="list-disc list-inside text-gray-700 leading-relaxed">
                    <li>Provide and improve our services.</li>
                    <li>Communicate with you regarding your account or inquiries.</li>
                    <li>Analyze usage to enhance user experience.</li>
                    <li>Ensure compliance with legal and regulatory requirements.</li>
                </ul>            </div>
        </div>

        <div class="border-b border-gray-200">
            <button id="faq5" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                Data Protection            </button>
            <div id="faq5-answer" class="px-6 py-4 text-gray-600 hidden">
                We implement appropriate technical and organizational measures to protect your data against unauthorized access, alteration, disclosure, or destruction.
            </div>
        </div>

        <div class="border-b border-gray-200">
            <button id="faq6" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
                Your Rights            </button>
            <div id="faq6-answer" class="px-6 py-4 text-gray-600 hidden">
                <p class="text-gray-700 leading-relaxed">
                    As a user, you have the right to:
                </p>
                <ul class="list-disc list-inside text-gray-700 leading-relaxed">
                    <li>Access the information we hold about you.</li>
                    <li>Request corrections to your personal data.</li>
                    <li>Request deletion of your data under certain circumstances.</li>
                    <li>Withdraw consent for data processing.</li>
                </ul>            </div>
        </div>

        <div class="border-b border-gray-200">
            <button id="faq7" class="w-full text-left py-4 px-6 text-xl font-semibold focus:outline-none" type="button">
               Contact Us          </button>
            <div id="faq7-answer" class="px-6 py-4 text-gray-600 hidden">
                <p class="text-gray-700 leading-relaxed">
                    If you have any questions or concerns about this privacy policy, please contact us at:
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Email: <a href="mailto:kaffahsilmi217@gmail.com" class="text-blue-500 hover:underline">realestate@gmail.com</a><br>
                    Phone: 
                    +62 987987297
                </p>            </div>
        </div>

       
    </div>
</div>
</div>
<script>
    document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', function () {
            const answer = document.getElementById(button.id + '-answer');
            const isVisible = answer.classList.contains('hidden');
            
            answer.classList.toggle('hidden', !isVisible);
        });
    });
</script>
   

   
@endsection
