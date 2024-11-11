@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
    {{-- <div class="container mx-auto px-4 py-8">
    <form action="{{ route('villas.book', $villa->id) }}" method="POST" class="flex flex-col lg:flex-row lg:space-x-6">
        @csrf
        
        <!-- Villa Details (Left Column) -->
        <div class="flex-1 bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="{{ Storage::url('villas/'.$villa->gambar) }}" class="w-full h-64 object-cover" alt="{{ $villa->nama }}">
            
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $villa->nama }}</h2>
                <p class="text-gray-600 mb-4">
                    <i class="fas fa-map-marker-alt text-red-500"></i> {{ $villa->lokasi }}<br>
                    <i class="fas fa-star text-yellow-400"></i> {{ $villa->rating }}/5<br>
                    <span class="text-lg font-semibold text-blue-600">Rp {{ number_format($villa->harga) }} / malam</span>
                </p>
                <h4 class="text-xl font-semibold text-gray-700 mt-6 mb-2">Deskripsi</h4>
                <p class="text-gray-600 mb-6">{!! strip_tags($villa->deskripsi, '<b><i><ul><li>') !!}</p>
            </div>
        </div>

        <!-- Booking Form (Right Column) -->
        <div class="flex-1 bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Booking Form</h2>
            <div class="space-y-6">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="check_in" class="block text-sm font-semibold text-gray-700">Check-in</label>
                    <input type="date" id="check_in" name="check_in" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required onchange="updateTotalPrice()">
                </div>

                <div class="mb-4">
                    <label for="check_out" class="block text-sm font-semibold text-gray-700">Check-out</label>
                    <input type="date" id="check_out" name="check_out" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required onchange="updateTotalPrice()">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700">Number of Guests</label>
                    <div class="flex items-center justify-center mt-2 space-x-4">
                        <!-- Decrement button -->
                        <button type="button" onclick="decrementGuests()" class="px-4 py-2 bg-gray-300 text-gray-600 rounded-full hover:bg-gray-400 focus:outline-none">
                            <i class="fas fa-minus"></i>
                        </button>
                        
                        <!-- Display for the number of guests -->
                        <span id="guestCount" class="text-xl font-semibold text-gray-700">1</span>
                        
                        <!-- Increment button -->
                        <button type="button" onclick="incrementGuests()" class="px-4 py-2 bg-gray-300 text-gray-600 rounded-full hover:bg-gray-400 focus:outline-none">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- Hidden input to store the value for form submission -->
                    <input type="hidden" id="guests" name="guests" value="1">
                </div>

                <!-- Total Price Display -->
                <div class="flex items-center justify-center mb-4">
                    <p class="text-lg font-semibold text-gray-800">Total Harga: <span id="totalPrice">Rp {{ number_format($villa->harga) }}</span></p>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Pay
                </button>
            </div>
        </div>
    </form>
</div> --}}

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row lg:max-w-7xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Left Column - Detail villa -->
            <div class="lg:w-1/2 p-6">
                <img src="{{ Storage::url('villas/' . $villa->gambar) }}" class="w-full h-64 object-cover"
                    alt="{{ $villa->nama }}">

                <!-- Detail villa -->
                <div class="mt-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $villa->nama }}</h2>
                    <p class="text-gray-600 mb-4">
                        <i class="fas fa-map-marker-alt text-red-500"></i> {{ $villa->lokasi }}<br>
                        <i class="fas fa-star text-yellow-400"></i> {{ $villa->rating }}/5<br>
                        <span class="text-lg font-semibold text-blue-600">Rp {{ number_format($villa->harga) }} /
                            malam</span>
                    </p>

                    <h4 class="text-xl font-semibold text-gray-700 mt-6 mb-2">Deskripsi</h4>
                    <p class="text-gray-600 mb-6">{!! strip_tags($villa->deskripsi, '<b><i><ul><li>') !!}</p>
                </div>
            </div>

            <!-- Right Column - Booking Form -->
            <div class="lg:w-1/2 p-6 bg-gray-100">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Booking</h3>
                <form action="{{ route('villas.book', $villa->id) }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
                        <input type="text" id="name" name="name"
                            class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="check_in" class="block text-sm font-semibold text-gray-700">Check-in</label>
                        <input type="date" id="check_in" name="check_in"
                            class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required onchange="updateTotalPrice()">
                    </div>

                    <div class="mb-4">
                        <label for="check_out" class="block text-sm font-semibold text-gray-700">Check-out</label>
                        <input type="date" id="check_out" name="check_out"
                            class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required onchange="updateTotalPrice()">
                    </div>


                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700">Number of Guests</label>
                        <div class="flex items-center justify-center mt-2 space-x-4">
                            <button type="button" onclick="decrementGuests()"
                                class="px-4 py-2 bg-gray-300 text-gray-600 rounded-full hover:bg-gray-400 focus:outline-none">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span id="guestCount" class="text-xl font-semibold text-gray-700">1</span>
                            <button type="button" onclick="incrementGuests()"
                                class="px-4 py-2 bg-gray-300 text-gray-600 rounded-full hover:bg-gray-400 focus:outline-none">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <input type="hidden" id="guests" name="guests" value="1">
                    </div>

                    <div class="flex items-center justify-center mb-4">
                        <p class="text-lg font-semibold text-gray-800">Total Harga: <span id="totalPrice">Rp
                                {{ number_format($villa->harga) }}</span></p>
                    </div>

                    <button type="submit" class="w-full py-2 rounded-md border transition duration-300"
                        style="background-color: white; color: #049484; border: 1px solid #049484;"
                        onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">
                        Pay
                    </button>
                </form>
            </div>
        </div>
    </div>


    <script>
        const basePrice = {{ $villa->harga }};

        function incrementGuests() {
            let countSpan = document.getElementById('guestCount');
            let hiddenInput = document.getElementById('guests');
            let currentValue = parseInt(hiddenInput.value);
            if (currentValue < 100) {
                hiddenInput.value = currentValue + 1;
                countSpan.textContent = hiddenInput.value;
                updateTotalPrice();
            }
        }

        function decrementGuests() {
            let countSpan = document.getElementById('guestCount');
            let hiddenInput = document.getElementById('guests');
            let currentValue = parseInt(hiddenInput.value);
            if (currentValue > 1) {
                hiddenInput.value = currentValue - 1;
                countSpan.textContent = hiddenInput.value;
                updateTotalPrice();
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0]; // Get today's date in 'YYYY-MM-DD' format
            document.getElementById('check_in').setAttribute('min', today);
            document.getElementById('check_out').setAttribute('min', today);
        });

        function updateTotalPrice() {
            const guestCount = parseInt(document.getElementById('guests').value);
            const checkInDate = new Date(document.getElementById('check_in').value);
            const checkOutDate = new Date(document.getElementById('check_out').value);

            // Calculate the number of nights
            const timeDiff = checkOutDate - checkInDate;
            const numberOfNights = timeDiff > 0 ? Math.ceil(timeDiff / (1000 * 60 * 60 * 24)) : 0;

            // Calculate total price
            const totalPrice = basePrice * guestCount * numberOfNights;
            document.getElementById('totalPrice').textContent = 'Rp ' + new Intl.NumberFormat().format(totalPrice);
        }
    </script>
@endsection
