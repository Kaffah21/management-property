@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informasi tentang perusahaan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row">
                        <!-- Foto -->
                        <div class="md:w-1/3 mb-4 md:mb-0">
                            <img src="/assets/About-us-page.svg" alt="Foto Perusahaan"
                                class="w-full h-auto rounded-md shadow-md">
                        </div>

                        <!-- Deskripsi dan Lokasi -->
                        <div class="md:w-2/3 md:pl-6">
                            <h3 class="text-lg font-semibold mb-2">Description</h3>
                            <p class="mb-4">
                                We are a company that specializes in property rental management. With years of experience in
                                the industry, we provide end-to-end services for property owners and tenants, including
                                property management, marketing, and customer service. Our goal is to ensure a smooth and
                                efficient rental experience for all parties involved. </p>
                            <h4 class="text-md font-semibold mb-1">Location</h4>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2719377547496!2d108.32438897409105!3d-7.323321492684871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5eba1b06f52f%3A0xaf882382d9de1508!2sSMK%20Negeri%201%20Ciamis!5e0!3m2!1sid!2sid!4v1731295450618!5m2!1sid!2sid"
                                width="750" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            {{-- <p>
                Jl. Teknologi No. 123,<br>
                Jakarta, Indonesia
            </p> --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
