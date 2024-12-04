<footer class="bg-gray-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-6 sm:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <h5 class="text-xl font-semibold mb-4">Real Estate</h5>
                <p class="text-gray-300 text-sm mb-4">
                    Welcome to our property platform, a place where you can find a wide selection of properties to rent or buy that suits your needs.
                </p>
                <div class="flex space-x-4">
                    <a href="https://www.instagram.com/kffh_217" class="text-white hover:text-gray-400 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/kaffah-ms-944088321?" class="text-white hover:text-gray-400 transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.github.com/Kaffah21" class="text-white hover:text-gray-400 transition-colors">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div>
                <ul class="space-y-3">
                    <li><a href="{{ route('master') }}" class="text-gray-300 hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('rumahs.index') }}" class="text-gray-300 hover:text-white transition-colors">Rumah</a></li>
                    <li><a href="{{ route('villas.index') }}" class="text-gray-300 hover:text-white transition-colors">Villa</a></li>
                    <li><a href="{{ url('contact-us') }}" class="text-gray-300 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="{{ url('about') }}" class="text-gray-300 hover:text-white transition-colors">About</a></li>
                </ul>
            </div>
            <div>
                <ul class="space-y-3">
                    <li><a href="{{url('faq')}}" class="text-gray-300 hover:text-white transition-colors">FAQs</a></li>
                    <li><a href="{{url('term-condition')}}" class="text-gray-300 hover:text-white transition-colors">Terms & Conditions</a></li>
                    <li><a href="{{route('blogs.index')}}" class="text-gray-300 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="{{url('privacy-policy')}}" class="text-gray-300 hover:text-white transition-colors">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-xl font-semibold mb-4">Contact Info</h5>
                <a class="text-gray-300 text-sm mb-4" href="mailto:kaffahsilmi217@gmail.com">Email: realestate@gmail.com</a>
                <p class="text-gray-300 text-sm">Phone: 
                    +62 987987297</p>
            </div>
        </div>
    </div>

    <div class="text-center text-gray-300 mt-8">
        <p>&copy; {{ date('Y') }} Real Estate. All rights reserved.</p>
    </div>
</footer>
