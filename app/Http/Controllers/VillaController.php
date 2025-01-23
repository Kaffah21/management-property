<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\Villa;
use App\Models\VillaTransaction;
use Illuminate\Support\Facades\Auth;
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
        // Mengambil data dari request
        $villa = Villa::findOrFail($id);
        $guestCount = $request->input('guests');
        $checkIn = new \DateTime($request->input('check_in'));
        $checkOut = new \DateTime($request->input('check_out'));
        $numberOfNights = $checkOut->diff($checkIn)->days;
        $totalPrice = $villa->harga * $guestCount * $numberOfNights;

        // Menyimpan data transaksi
        $transaction = VillaTransaction::create([
            'villa_id' => $villa->id,
            'user_name' => $request->input('name'),
            'user_email' => $request->input('email'),
            'guests' => $guestCount,
            'check_in' => $checkIn->format('Y-m-d'),
            'check_out' => $checkOut->format('Y-m-d'),
            'total_price' => $totalPrice,
            'payment_status' => 'pending',
        ]);

        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transactionDetails = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $request->input('name'),
                'email' => $request->input('email'),
            ],
        ];

        $snapToken = Snap::getSnapToken($transactionDetails);

        return view('villas.payment', compact('snapToken', 'villa', 'totalPrice','transaction'));
    }

    public function paymentNotification(Request $request)
    {
        // Menangani notifikasi dari Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $notification = new Notification();

        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        // Cari transaksi berdasarkan order_id
        $transaction = VillaTransaction::find($orderId);

        if ($transaction) {
            switch ($transactionStatus) {
                case 'capture':
                case 'settlement':
                    $transaction->payment_status = 'paid';
                    break;

                case 'pending':
                    $transaction->payment_status = 'pending';
                    break;

                case 'deny':
                case 'cancel':
                case 'expire':
                    $transaction->payment_status = 'failed';
                    break;
            }

            $transaction->save();
        }

        return response()->json(['status' => 'success']);
    }

    // public function midtransNotification(Request $request)
    // {
    //     $notification = new Notification();

    //     $transactionStatus = $notification->transaction_status;
    //     $orderId = $notification->order_id;
    //     $paymentType = $notification->payment_type;

    //     $transaction = VillaTransaction::where('order_id', $orderId)->first();

    //     if (!$transaction) {
    //         return response()->json(['error' => 'Transaction not found'], 404);
    //     }

    //     switch ($transactionStatus) {
    //         case 'capture':

    //             if ($paymentType == 'credit_card') {
    //                 $transaction->payment_status = 'success';
    //             }
    //             break;

    //         case 'settlement':
    //             // Jika status pembayaran diselesaikan
    //             $transaction->payment_status = 'success';
    //             break;

    //         case 'pending':
    //             // Jika pembayaran masih pending
    //             $transaction->payment_status = 'pending';
    //             break;

    //         case 'cancel':
    //         case 'expire':
    //             $transaction->payment_status = 'failed';
    //             break;
    //     }

    //     $transaction->save();

    //     return response()->json(['status' => 'success']);
    // }

    public function updateStatus(Request $request)
{
    $request->validate([
        'transaction_id' => 'required|exists:villa_transactions,id',
    ]);

    $transaction = VillaTransaction::find($request->transaction_id);

    if ($transaction) {
        $transaction->payment_status = 'success'; // Ubah status menjadi success
        $transaction->save();

        return response()->json(['message' => 'Status pembayaran berhasil diperbarui.']);
    }

    return response()->json(['message' => 'Transaksi tidak ditemukan.'], 404);
}


    public function paymentHistory()
    {
        $userEmail = Auth::user()->email;

        $transactions = VillaTransaction::with('villa')
            ->where('user_email', $userEmail) 
            ->latest()
            ->paginate(10);
    
        return view('payment.history', compact('transactions'));
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
