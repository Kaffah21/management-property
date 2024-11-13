<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'MyApp') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Pastikan ini sesuai dengan struktur CSS Anda -->
    <script src="{{ asset('js/app.js') }}" defer></script> <!-- Pastikan ini sesuai dengan struktur JS Anda -->
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main class="flex-1 container mx-auto my-4">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Optional Scripts -->
    @yield('scripts')
</body>
</html>
