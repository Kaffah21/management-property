<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto">
        <div class="max-w-md mx-auto mt-20 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

            <!-- Display error if exists -->
            @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <b>Error:</b> {{ session('error') }}
            </div>
            @endif

            <!-- Login form -->
            <form action="{{ route('actionlogin') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="email" placeholder="Masukan email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="password" placeholder="Masukan password" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">Login</button>
            </form>

            <hr class="my-6">

            <p class="text-center">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a> Sekarang!</p>
        </div>
    </div>

    <!-- Optional: Tailwind JS for extra functionality -->
</body>

</html>
