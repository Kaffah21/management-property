<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>

        <!-- Form login -->
        <form method="POST" action="{{ route('admin.login.submit') }}">
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
</body>
</html>
