<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container mx-auto p-8">
        <img src="assets/content.png" alt="Properti" class="w-full h-80 rounded-lg shadow-lg"> 
    </div>
    
    <a href="{{ url('/rumah') }}" class="block text-2xl font-bold mb-6 text-center">Rumah</a>
    
    <div class="flex flex-col items-center mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-7xl">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Card Title 1</h2>
                <p class="text-gray-600">This is a description for card 1. You can add more details here.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Card Title 2</h2>
                <p class="text-gray-600">This is a description for card 2. You can add more details here.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Card Title 3</h2>
                <p class="text-gray-600">This is a description for card 3. You can add more details here.</p>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script>
        const button = document.querySelector('button[id="options-menu"]');
        const dropdown = document.getElementById('dropdown-menu');

        button.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', (event) => {
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

</body>
</html>
