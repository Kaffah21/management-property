@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-12 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 md:w-2/3 lg:w-1/2">
        <div class="text-center mb-6">
            <!-- Title -->
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Pembayaran</h2>
            <div class="bg-gray-100 p-6 rounded-lg mb-6">
                <ul class="space-y-2">
                    <li class="flex justify-between text-gray-700">
                        <span class="font-semibold">Property:</span>
                        <span>{{ $villa->nama }}</span>
                    </li>
                    <li class="flex justify-between text-gray-700">
                        <span class="font-semibold">Location:</span>
                        <span>{{ $villa->lokasi }}</span>
                    </li>
                    <li class="flex justify-between text-gray-700">
                        <span class="font-semibold">Check-in:</span>
                        <span>{{ $villa->created_at->format('d M Y') }}</span>
                    </li>
                    <li class="flex justify-between text-gray-700">
                        <span class="font-semibold">Check-out:</span>
                        <span>{{ $villa->checkOutDate }}</span>
                    </li>
                    <li class="flex justify-between text-gray-700">
                        <span class="font-semibold">Total:</span>
                        <span>{{ number_format($totalPrice) }}</span>
                    </li>
                    
                </ul>

            {{-- <p class="text-lg text-gray-700 mb-4"><span class="font-semibold">Nama Villa:</span> {{ $villa->nama }}</p>
            <p class="text-lg text-gray-700 mb-4"><span class="font-semibold">Lokasi:</span> {{ $villa->lokasi }}</p>
            <p class="text-2xl font-bold text-green-600 mb-6">Total Harga: Rp {{ number_format($totalPrice) }}</p>
             --}}
            <!-- Payment Button -->
            <button id="pay-button" class="px-6 py-2 rounded-md border transition duration-300"
            style="background-color: white; color: #049484; border: 1px solid #049484;"
            onmouseover="this.style.backgroundColor='#049484'; this.style.color='white';"
            onmouseout="this.style.backgroundColor='white'; this.style.color='#049484';">Bayar Sekarang</button>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
   document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            console.log(result);

            // memperbarui status 
            fetch('/payment/update-status', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                },
                body: JSON.stringify({
                    transaction_id: '{{ $transaction->id }}' 
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert("Pembayaran berhasil! " + data.message);
                    window.location.href = "/payment/success";
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Terjadi kesalahan saat memperbarui status pembayaran.");
            });
        },
        onPending: function(result) {
            console.log(result);
            alert("Pembayaran tertunda, silakan cek status pembayaran.");
            window.location.href = "/payment/pending";
        },
        onError: function(result) {
            console.log(result);
            alert("Pembayaran gagal, silakan coba lagi.");
        },
        onClose: function() {
            alert("Anda menutup popup pembayaran tanpa menyelesaikannya.");
        }
    });
};

</script>
@endsection
