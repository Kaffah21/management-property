<nav id="navbar" class="bg-transparent p-2 sticky top-0 z-50 transition-all duration-500">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Brand -->
        <a href="{{ route('master') }}" class="flex items-center">
            <img src="assets/logo.png" alt="Logo" class="h-16 mr-2">
        </a>
        

        <!-- Centered Links for Desktop -->
        <div class="hidden md:flex flex-1 justify-center space-x-6">
            <a href="{{ route('master') }}" class="text-black hover:text-gray font-semibold">Home</a>
            <a href="{{route('rumahs.index')}}" class="text-black hover:text-gray font-semibold">Properti Rumah</a>
            <a href="{{route('villas.index')}}" class="text-black hover:text-gray font-semibold">Properti Villa</a>
            <a href="{{url('contact-us')}}" class="text-black hover:text-gray font-semibold">Contact Us</a>
            <a href="{{url('about')}}" class="text-black hover:text-gray font-semibold">About Us</a>
        </div>

        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-blue-500">Login</a>
                <a href="{{ route('register') }}" class="text-green-500">Register</a>
            @else
            <div class="relative">
                <!-- Button to toggle dropdown -->
                <button id="profileMenuButton" class="flex items-center focus:outline-none">
                    <span class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </button>
            
                <!-- Dropdown menu -->
                <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit Profile</a>
                    <a href="{{ route('payment.history') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Riwayat Transaksi</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</button>
                    </form>
                </div>
            </div>
            @endguest
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
            <a href="{{route('rumahs.index')}}" class="text-black hover:text-gray font-semibold py-2">Properti Rumah</a>
            <a href="{{route('villas.index')}}" class="text-black hover:text-gray font-semibold py-2">Properti Villa</a>
            <a href="{{url('contact')}}" class="text-black hover:text-gray font-semibold py-2">Contact Us</a>
            <a href="{{url('about')}}" class="text-black hover:text-gray font-semibold py-2">About Us</a>
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-blue-500">Login</a>
                    <a href="{{ route('register') }}" class="text-green-500">Register</a>
                @else
                {{-- <div class="relative">
                    <!-- Button to toggle dropdown -->
                    <button id="profileMenuButton" class="flex items-center focus:outline-none">
                        <span class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </button>
                
                    <!-- Dropdown menu -->
                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit Profile</a>
                        <!-- Menu untuk melihat riwayat transaksi -->
                        <a href="{{ route('payment.history') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Riwayat Transaksi</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Logout</button>
                        </form>
                    </div>                    
                </div> --}}
                @endguest
            </div>
        </div>
    </div>
</nav>

<script>

window.onscroll = function() { changeNavbarColor() };

function changeNavbarColor() {
    const navbar = document.getElementById("navbar");
    const isMasterPage = window.location.pathname === "{{ route('master') }}"; // Sesuaikan rute "master" di sini

    
    if (window.scrollY > 100) {
        navbar.classList.add("bg-gray-200", "shadow-md");
        navbar.classList.remove("bg-transparent");
    } else {
        navbar.classList.add("bg-transparent");
        navbar.classList.remove("bg-gray-200", "shadow-md");
    }
}
    // Toggle Mobile Menu
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Toggle Profile Dropdown
    document.addEventListener("DOMContentLoaded", function () {
        const profileMenuButton = document.getElementById('profileMenuButton');
        const profileMenu = document.getElementById('profileMenu');

        profileMenuButton.addEventListener('click', function (event) {
            event.stopPropagation(); // Prevent closing immediately when clicked
            profileMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicking outside of it
        document.addEventListener('click', function(event) {
            if (!profileMenuButton.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.add('hidden');
            }
        });
    });
</script>

