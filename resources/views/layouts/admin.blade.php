<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Burger Icon for Sidebar Toggle -->
    <div class="p-4 bg-gray-800 text-white fixed top-0 left-0 z-20 md:hidden">
        <button id="burger" class="focus:outline-none">
            <!-- Burger icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <div class="flex">
        <div id="sidebar" class="w-64 bg-gray-800 text-white h-screen p-5 fixed transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center mb-4">
                <img src="/assets/logo.png" alt="Logo" class="h-10 mr-2">
            </a> 
            <ul>
                <li class="mb-2"><a href="{{ route('admin.dashboard') }}"
                        class="text-white hover:bg-gray-700 rounded-lg p-2 block">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('admin.rumah.index') }}"
                        class="text-white hover:bg-gray-700 rounded-lg p-2 block">Properti Home</a></li>
                <li class="mb-2"><a href="{{ route('admin.villas.index') }}"
                        class="text-white hover:bg-gray-700 rounded-lg p-2 block">Properti Villa</a></li>
                <li class="mb-2"><a href="{{ route('admin.penyewa.index') }}"
                        class="text-white hover:bg-gray-700 rounded-lg p-2 block">Tenant Data</a></li>
                <li class="mb-2"><a href="{{ route('admin.pemilik.index') }}"
                        class="text-white hover:bg-gray-700 rounded-lg p-2 block">Owner Data</a></li>
                <li class="mb-2"><a href="{{ route('actionlogout') }}"
                        class="text-red-400 hover:bg-gray-700 rounded-lg p-2 block">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-0 md:ml-64 transition-all duration-300" id="main-content">
            @yield('content')
        </div>
    </div>

    <script>
        const burger = document.getElementById('burger');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        burger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            mainContent.classList.toggle('ml-64');
        });
    </script>

</body>

</html>
