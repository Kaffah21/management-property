<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex">
        <div class="w-64 bg-gray-800 text-white h-screen p-5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center mb-4">
                <img src="/assets/logo.png" alt="Logo" class="h-10 mr-2"> <!-- Logo Image -->
            </a>
            <ul>
                <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">Dashboard</a></li>
                <li class="mb-2"><a href="{{route('admin.rumah.index')}}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">Properti Rumah</a></li>
                <li class="mb-2"><a href="{{route('admin.villa.index')}}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">Properti Villa</a></li>
                <li class="mb-2"><a href="{route{('user.index')}}" class="text-white hover:bg-gray-700 rounded-lg p-2 block">Pengguna</a></li>
                <li class="mb-2"><a href="{{ route('actionlogout') }}" class="text-red-400 hover:bg-gray-700 rounded-lg p-2 block">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
