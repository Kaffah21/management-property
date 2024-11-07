<?php

namespace App\Http\Controllers;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Rumah; 
use Illuminate\Http\Request;

class RumahController extends Controller
{
    public function index()
    {
        $rumahs = Rumah::latest()->paginate(12); 
        return view('rumahs.index', compact('rumahs'));
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id); 
        return view('rumahs.show', compact('rumah'));
    }

    public function showBookingForm($id)
    {
        $rumah = Rumah::findOrFail($id); 
        return view('rumahs.booking', compact('rumah'));
    }

    public function bookRumah(Request $request, $id)
    {
        $rumah = Rumah::findOrFail($id);

        $guestCount = $request->input('guests');
        $checkIn = new \DateTime($request->input('check_in'));
        $checkOut = new \DateTime($request->input('check_out'));
        $numberOfNights = $checkOut->diff($checkIn)->days;
        $totalPrice = $rumah->harga * $guestCount * $numberOfNights;

        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transaction = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $request->input('name'),
                'email' => $request->input('email'),
            ],
        ];

        $snapToken = Snap::getSnapToken($transaction);

        return view('rumahs.payment', compact('snapToken', 'rumah', 'totalPrice'));
    }

    public function paymentSuccess()
    {
        return view('payment.success'); 
    }

    public function paymentPending()
    {
        return view('payment.pending'); 
    }
}
