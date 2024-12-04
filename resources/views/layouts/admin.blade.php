<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
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
                <img src="/assets/logo.png" alt="Logo" class="h-14 mr-2">
            </a> 
            <ul style="margin-top: 50px">
                <li class="mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                        <i class="fas fa-tachometer-alt mr-2"></i> 
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.rumah.index') }}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                        <i class="fas fa-home mr-2"></i> 
                        Properti Home
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.villas.index') }}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                        <i class="fas fa-building mr-2"></i> 
                        Properti Villa
                    </a>
                </li>
                <li class="mb-2">
                    <div class="relative">
                        <a href="#" class="text-white hover:bg-gray-700 rounded-lg p-2 block flex items-center" onclick="toggleDropdown(event, 'contentDropdown')">
                            <i class="fas fa-layer-group mr-2"></i>
                            Content
                        </a>
                        
                        <!-- Dropdown menu -->
                        <div id="contentDropdown" class="hidden absolute left-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg ml-4">
                            <a href="{{route('admin.blogs.index')}}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                                <i class="fas fa-blog mr-2"></i>
                                Blog
                            </a>
                            <a href="{{route('admin.faq.index')}}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                                <i class="fas fa-question-circle mr-2"></i>
                                Faq
                            </a>
                        </div>
                    </div>
                </li>
              
                <li class="mb-2">
                    <a href="{{ route('admin.penyewa.index') }}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                        <i class="fas fa-user-friends mr-2"></i> 
                        Tenant Data
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.pemilik.index') }}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                        <i class="fas fa-user-tie mr-2"></i> 
                        Owner Data
                    </a>
                </li>
                <li class="mb-2">
                    <div class="relative">
                        <a href="#" class="text-white hover:bg-gray-700 rounded-lg p-2 block flex items-center" onclick="toggleDropdown(event, 'transactionDropdown')">
                            <i class="fas fa-receipt mr-2"></i>
                            Transaction
                        </a>
                        
                        <!-- Dropdown menu -->
                        <div id="transactionDropdown" class="hidden absolute left-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg ml-4">
                            <a href="{{route('admin.transaksi.rumah')}}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                                <i class="fas fa-home mr-2"></i>
                                Rumah
                            </a>
                            <a href="" class="text-white hover:bg-gray-700 rounded-lg p-2 block">
                                <i class="fas fa-building mr-2"></i>
                                Villa
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mb-2" id="logout">
                    <a href="{{ route('actionlogout') }}" class="text-red-400 hover:bg-gray-700 rounded-lg p-2 block">
                        <i class="fas fa-sign-out-alt mr-2"></i> 
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 ml-0 md:ml-64 transition-all duration-300" id="main-content">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleDropdown(event, dropdownId) {
            event.preventDefault();
            const dropdown = document.getElementById(dropdownId);
            const logout = document.getElementById('logout');

            dropdown.classList.toggle("hidden");

            if (!dropdown.classList.contains("hidden")) {
                logout.classList.add("mt-32"); 
            } else {
                logout.classList.remove("mt-32");
            }
        }

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
