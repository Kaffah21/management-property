<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gray-800 text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-start">
            <head>
                <!-- Existing head content -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            </head>


            <!-- Left Section: Website Info -->
            <div class="w-1/2">
                <h5 class="text-lg font-semibold">Real Estate</h5>
                <p class="mt-2"> 
                    Welcome to our property platform, a place where you can find a wide selection of properties to rent or buy  that suits your needs.
                     </p>
            </div>
            <!-- Right Section: Links -->
            <div class="w-1/2 flex flex-col items-end">
                <div class="mb-2">
                    <a href="{{ route('master') }}" class="text-gray-400 hover:text-gray-300">Home</a>
                    <a href="{{ route('rumahs.index') }}" class="text-gray-400 hover:text-gray-300">Rumah</a>
                    <a href="{{ route('villas.index') }}" class="text-gray-400 hover:text-gray-300">Villa</a>
                    <a href="{{url('contact-us')}}" class="text-gray-400 hover:text-gray-300">Contact Us</a>
                    <a href="{{ url('about') }}" class="text-gray-400 hover:text-gray-300">About</a>


                </div>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-white hover:text-gray-400" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/kffh_217" class="text-white hover:text-gray-400" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/kaffah-ms-944088321?" class="text-white hover:text-gray-400" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.github.com/Kaffah21" class="text-white hover:text-gray-400" aria-label="LinkedIn">
                        <i class="fab fa-github"></i>
                    </a>
        
                </div>
                
                <div class="f-bottom">
                    <div class="auto-container">
                        <div class="inner clearfix">
                            <div class="copyright"><a href="">Copyright
                                        by kaffah</a></strong>
                                &copy; 2024
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div> 
</footer>
