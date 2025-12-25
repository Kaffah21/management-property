<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/assets/villa.jpg');">
        <!-- Add an overlay for opacity -->
        <div class="absolute inset-0 bg-black opacity-30"></div>
    </div>

    <!-- Login Form Container -->
    <div class="relative z-10 flex items-center justify-center min-h-screen">
        <div class="bg-white  p-8 rounded-lg shadow-md w-full max-w-sm">
              {{-- <div class="flex justify-center mb-6">
                <img src="/assets/logo.png" alt="Logo" class="h-16">
              </div> --}}
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Admin Login</h2>

            <!-- Form login -->
            <form class="form w-100" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 mt-1 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" name="password" id="password" class="border rounded w-full py-2 px-3 mt-1 focus:outline-none" required>
                </div>

                @if ($errors->any())
                    <div class="text-red-500 mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded w-full hover:bg-blue-600">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
