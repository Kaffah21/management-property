<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 75%;
            background-image: url('assets/content.png');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Background Image -->
    <div class="background-image"></div>

    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container mx-auto p-8" style="margin-top:50px;">
        <!-- Placeholder Search -->
        <form action="{{ route('search') }}" method="GET" class="flex justify-center space-x-4 mb-8">
            <input type="text" name="query" placeholder="Cari properti di sini..."
                   class="w-full md:w-1/2 p-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#049484] focus:border-[#049484]"
                   required>
            <button type="submit" class="px-6 py-2 rounded-md border transition duration-300"
                    style="background-color: white; color: #049484; border: 1px solid #049484;"
                    onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
                    onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">
                Cari
            </button>
        </form>
    </div>
    
    



    <a style="margin-top: 275px" href="{{ url('/rumah') }}" class="block text-2xl font-bold mb-6 text-center">Rumah</a>

    <div class="container mx-auto px-4 mb-12"> 
        <!-- Grid container -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($rumahs  as $rumah)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                <img src="{{ Storage::url('rumah/'.$rumah->gambar) }}" class="w-full h-48 object-cover" alt="{{ $rumah->nama }}">
                <div class="p-6">
                    <h5 class="text-lg font-bold mb-2">{{ $rumah->nama }}</h5>
                    <p class="text-gray-600 text-sm mb-4">
                        <i class="fas fa-map-marker-alt text-red-500"></i> {{ $rumah->lokasi }}<br>
                        <i class="fas fa-star text-yellow-400"></i> {{ $rumah->rating }}/5<br>
                        <span class="font-semibold text-lg text-gray-800">Rp {{ number_format($rumah->harga) }} / malam</span>
                    </p>
                    <a href="{{ route('rumahs.show', $rumah) }}"  class="px-6 py-2 rounded-md border transition duration-300"
                    style="background-color: white; color: #049484; border: 1px solid #049484;"
                    onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
                    onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">Lihat Detail</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('rumahs.index') }}"
               class="px-6 py-2 rounded-md border transition duration-300"
               style="background-color: white; color: #049484; border: 1px solid #049484;"
               onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
               onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">
                View More
            </a>
        </div>
        
        

        
    </div>
    <a href="{{ url('/villas') }}" class="block text-2xl font-bold mb-6 text-center" style="font-">Villa</a>

    <div class="container mx-auto px-4 mb-12"> 

        <!-- Grid container -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($villas ?? [] as $villa)
                <div
                    class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <img src="{{ Storage::url('villas/' . $villa->gambar) }}" class="w-full h-48 object-cover"
                        alt="{{ $villa->nama }}">
                    <div class="p-6">
                        <h5 class="text-lg font-bold mb-2">{{ $villa->nama }}</h5>
                        <p class="text-gray-600 text-sm mb-4">
                            <i class="fas fa-map-marker-alt text-red-500"></i> {{ $villa->lokasi }}<br>
                            <i class="fas fa-star text-yellow-400"></i> {{ $villa->rating }}/5<br>
                            <span class="font-semibold text-lg text-gray-800">Rp {{ number_format($villa->harga) }} /
                                malam</span>
                        </p>
                        <a href="{{ route('villas.show', $villa) }}" class="px-6 py-2 rounded-md border transition duration-300"
                        style="background-color: white; color: #049484; border: 1px solid #049484;"
                        onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('villas.index') }}"
               class="px-6 py-2 rounded-md border transition duration-300"
               style="background-color: white; color: #049484; border: 1px solid #049484;"
               onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
               onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">
                View More
            </a>
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
