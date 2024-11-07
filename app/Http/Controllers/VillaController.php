<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    public function index()
    {
        $villas = Villa::latest()->paginate(12);
        return view('villas.index', compact('villas'));
    }

    public function show($id)
    {
        $villa = Villa::findOrFail($id);
        return view('villas.show', compact('villa'));
    }

    public function showBookingForm($id)
    {
        $villa = Villa::findOrFail($id);
        return view('villas.booking', compact('villa'));
    }

    public function bookVilla(Request $request, $id)
    {
        $villa = Villa::findOrFail($id);

        $guestCount = $request->input('guests');
        $checkIn = new \DateTime($request->input('check_in'));
        $checkOut = new \DateTime($request->input('check_out'));
        $numberOfNights = $checkOut->diff($checkIn)->days;
        $totalPrice = $villa->harga * $guestCount * $numberOfNights;

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

        return view('villas.payment', compact('snapToken', 'villa', 'totalPrice'));
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
