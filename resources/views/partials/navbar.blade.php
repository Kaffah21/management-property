<nav class="bg-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Brand -->
        <a href="{{ route('master') }}" class="flex items-center">
            <img src="assets/logo.png" alt="Logo" class="h-8 mr-2">
        </a>

        <!-- Centered Links for Desktop -->
        <div class="hidden md:flex flex-1 justify-center space-x-6">
            <a href="{{ route('master') }}" class="text-black hover:text-gray font-semibold">Home</a>
            <a href="" class="text-black hover:text-gray font-semibold">Properti Rumah</a>
            <a href="#" class="text-black hover:text-gray font-semibold">Properti Villa</a>
            <a href="#" class="text-black hover:text-gray font-semibold">Contact Us</a>
            <a href="#" class="text-black hover:text-gray font-semibold">About Us</a>
        </div>

        <div class="hidden md:flex  space-x-4">
            <a href="#" class="text-black hover:text-gray font-semibold">Login</a>
            <a href="#" class="text-gray-500 hover:text-black font-semibold">Register</a>
        </div>


        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="flex flex-col items-center mt-2">
            <a href="{{ route('master') }}" class="text-black hover:text-gray font-semibold py-2">Home</a>
            <a href="#" class="text-black hover:text-gray font-semibold py-2">Properti Rumah</a>
            <a href="#" class="text-black hover:text-gray font-semibold py-2">Properti Villa</a>
            <a href="#" class="text-black hover:text-gray font-semibold py-2">Contact Us</a>
            <a href="#" class="text-black hover:text-gray font-semibold py-2">About Us</a>
            <div class="flex space-x-4 mt-4">
                <a href="#" class="text-black hover:text-gray font-semibold">Login</a>
                <a href="#" class="text-gray-500 hover:text-black font-semibold">Register</a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
