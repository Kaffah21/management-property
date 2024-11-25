<nav id="navbar" class="bg-transparent p-2 sticky top-0 z-50 transition-all duration-500">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('master') }}" class="flex items-center">
            <img src="assets/logo.png" alt="Logo" class="h-16 mr-2">
        </a>

        <div class="hidden md:flex flex-1 justify-center space-x-6">
            <a href="{{ route('master') }}" class="text-black hover:text-gray font-semibold">Home</a>
            <a href="{{route('rumahs.index')}}" class="text-black hover:text-gray font-semibold"> Rumah</a>
            <a href="{{route('villas.index')}}" class="text-black hover:text-gray font-semibold"> Villa</a>
            <a href="{{url('contact-us')}}" class="text-black hover:text-gray font-semibold">Contact Us</a>
            <a href="{{url('about')}}" class="text-black hover:text-gray font-semibold">About Us</a>
        </div> 

        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-gray-800 font-semibold text-sm px-4 py-2 rounded-lg transition duration-300 hover:text-white hover:bg-gray-700 border border-gray-700 mr-2">Sign In</a>
                <a href="{{ route('register') }}" class="text-white font-semibold text-sm px-4 py-2 rounded-lg transition duration-300 bg-gray-800 hover:bg-gray-700">Sign Up</a>
            @else
                <div class="relative">
                    <button id="profileMenuButton" class="flex items-center focus:outline-none">
                        @if(Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="w-10 h-10 bg-gray-600 rounded-full object-cover">
                        @else
                            <span class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center text-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        @endif
                    </button>
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
            <a href="{{route('rumahs.index')}}" class="text-black hover:text-gray font-semibold py-2"> Rumah</a>
            <a href="{{route('villas.index')}}" class="text-black hover:text-gray font-semibold py-2"> Villa</a>
            <a href="{{url('contact')}}" class="text-black hover:text-gray font-semibold py-2">Contact Us</a>
            <a href="{{url('about')}}" class="text-black hover:text-gray font-semibold py-2">About Us</a>

            <div class="flex items-center space-x-4 mt-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-800 font-semibold text-sm px-4 py-2 rounded-lg transition duration-300 hover:text-white hover:bg-gray-700 border border-gray-700 mr-2">Sign In</a>
                    <a href="{{ route('register') }}" class="text-white font-semibold text-sm px-4 py-2 rounded-lg transition duration-300 bg-gray-800 hover:bg-gray-700">Sign Up</a>
                @else
                    <div class="relative">
                        <button id="profileMenuButtonMobile" class="flex items-center focus:outline-none">
                            @if(Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="w-10 h-10 bg-gray-600 rounded-full object-cover">
                            @else
                                <span class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center text-white">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            @endif
                        </button>
                        <div id="profileMenuMobile" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
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
        </div>
    </div>
</nav>

<script>
    window.onscroll = function() { changeNavbarColor() };

    function changeNavbarColor() {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 100) {
            navbar.classList.add("bg-gray-200", "shadow-md");
            navbar.classList.remove("bg-transparent");
        } else {
            navbar.classList.add("bg-transparent");
            navbar.classList.remove("bg-gray-200", "shadow-md");
        }
    }

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    document.addEventListener("DOMContentLoaded", function () {
        const profileMenuButton = document.getElementById('profileMenuButton');
        const profileMenu = document.getElementById('profileMenu');

        profileMenuButton.addEventListener('click', function (event) {
            event.stopPropagation(); // Prevent closing immediately when clicked
            profileMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!profileMenuButton.contains(event.target) && !profileMenu.contains(event.target)) {
                profileMenu.classList.add('hidden');
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        const profileMenuButtonMobile = document.getElementById('profileMenuButtonMobile');
        const profileMenuMobile = document.getElementById('profileMenuMobile');

        profileMenuButtonMobile.addEventListener('click', function (event) {
            event.stopPropagation(); // Prevent closing immediately when clicked
            profileMenuMobile.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!profileMenuButtonMobile.contains(event.target) && !profileMenuMobile.contains(event.target)) {
                profileMenuMobile.classList.add('hidden');
            }
        });
    });
</script>
