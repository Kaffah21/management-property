@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-center">
        <h2 class="text-2xl font-bold mb-4">Pembayaran</h2>
        <p class="mb-6">Total Harga: Rp {{ number_format($totalPrice) }}</p>
        <button id="pay-button" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Bayar Sekarang</button>
    </div>
</div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            // Optional callbacks
            onSuccess: function(result) {
                console.log(result);
                window.location.href = "/payment/success";
            },
            onPending: function(result) {
                console.log(result);
                window.location.href = "/payment/pending";
            },
            onError: function(result) {
                console.log(result);
                alert("Pembayaran gagal, silakan coba lagi.");
            }
        });
    };
</script>
@endsection
