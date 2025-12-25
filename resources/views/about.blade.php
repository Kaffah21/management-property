@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <!-- About Us Header -->
                <div class="text-center mb-10">
                    <h1 class="text-2xl font-bold text-gray-800">About Us</h1>
                </div>

                <!-- About Us Content (Image + Description) -->
                <div class="flex flex-col md:flex-row items-center justify-between mb-12">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="/assets/About-us-page.svg" alt="About Us Image" class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <div class="md:w-1/2 md:pl-8">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Who We Are</h2>
                        <p class="text-gray-600 leading-relaxed">
                            We are a property management company specializing in rental services. With years of experience in the industry, we ensure that both property owners and tenants have the best rental experience possible. Our goal is to provide reliable, efficient, and effective property management services.
                        </p>
                    </div>
                </div>

                <!-- Team Section -->
                <div class="text-center mb-12">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Founder</h2>
                    <div class="flex justify-center space-x-6">
                        <!-- Team Member 1 -->
                        <div class="relative group rounded-lg overflow-hidden shadow-md">
                            <img src="/assets/kaffah.jpeg" alt="Team Member" class="w-48 h-48 object-cover rounded-full mx-auto">
                            <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 flex flex-col items-center justify-center text-white transition-opacity duration-300">
                                <p class="font-semibold">Prof M silmi Kaffah S.T M.T</p>
                                <p class="text-sm">Founder & CEO</p>
                            </div>
                        </div>
                        <!-- Add more team members as needed -->
                    </div>
                </div>

                <!-- Values Section -->
                <div class="bg-gray-50 py-10">
                    <div class="text-center mb-10">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Visi</h2>
                        <p class="text-lg text-gray-600 mb-4">We believe in the principles that guide us toward success.</p>
                    </div>
                    <div class="flex flex-wrap justify-center gap-10">
                        <div class="max-w-xs text-center">
                            <div class="p-6 rounded-lg bg-white shadow-lg">
                                <h3 class="text-lg font-semibold text-gray-800">Integrity</h3>
                                <p class="text-gray-600 mt-2">We maintain honesty and 5 S standards</p>
                            </div>
                        </div>
                        <div class="max-w-xs text-center">
                            <div class="p-6 rounded-lg bg-white shadow-lg">
                                <h3 class="text-lg font-semibold text-gray-800">Customer Satisfaction</h3>
                                <p class="text-gray-600 mt-2">We will do the maximum service</p>
                            </div>
                        </div>
                        <div class="max-w-xs text-center">
                            <div class="p-6 rounded-lg bg-white shadow-lg">
                                <h3 class="text-lg font-semibold text-gray-800">Innovation</h3>
                                <p class="text-gray-600 mt-2">We leverage the latest technology and creative solutions to streamline our processes.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Location</h2>
                    <div class="relative w-full h-80">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d247.34523381486764!2d108.26437052339321!3d-7.294898644343314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sid!2sid!4v1737096036074!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
