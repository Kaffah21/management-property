<?php

namespace App\Http\Controllers;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\RumahTransaction;
use App\Models\Rumah; 
use Illuminate\Support\Facades\Auth;
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
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        // Mendapatkan data rumah
        $rumah = Rumah::findOrFail($id);
        $guestCount = $request->input('guests');
        $checkIn = new \DateTime($request->input('check_in'));
        $checkOut = new \DateTime($request->input('check_out'));
        $numberOfNights = $checkOut->diff($checkIn)->days;
        $totalPrice = $rumah->harga * $guestCount * $numberOfNights;

        // Simpan data transaksi
        $transaction = RumahTransaction::create([
            'rumah_id' => $rumah->id,
            'user_name' => $request->input('name'),
            'user_email' => $request->input('email'),
            'guests' => $guestCount,
            'check_in' => $checkIn->format('Y-m-d'),
            'check_out' => $checkOut->format('Y-m-d'),
            'total_price' => $totalPrice,
            'payment_status' => 'pending', // Status awal
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transactionDetails = [
            'transaction_details' => [
                'order_id' => $transaction->id, // Gunakan ID transaksi sebagai order_id
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $request->input('name'),
                'email' => $request->input('email'),
            ],
        ];

        $snapToken = Snap::getSnapToken($transactionDetails);

        return view('rumahs.payment', compact('snapToken', 'rumah', 'totalPrice','transaction'));
    }
     
    public function midtransNotification(Request $request)
    {
          $notif = new Notification();

          $transaction = RumahTransaction::find($notif->order_id);
          $transactionStatus = $notif->transaction_status;
          $fraudStatus = $notif->fraud_status;
  
          if ($transactionStatus == 'capture') {
              if ($fraudStatus == 'accept') {
                  $transaction->status = 'success';
              }
          } elseif ($transactionStatus == 'settlement') {
              $transaction->status = 'success';
          } elseif ($transactionStatus == 'pending') {
              $transaction->status = 'pending';
          } elseif ($transactionStatus == 'deny') {
              $transaction->status = 'failed';
          } elseif ($transactionStatus == 'expire') {
              $transaction->status = 'expired';
          } elseif ($transactionStatus == 'cancel') {
              $transaction->status = 'canceled';
          }
  
          $transaction->save();
  
          return response()->json(['message' => 'Notification handled']);
    }
    public function paymentHistoryRumah()
{
    // Ambil email pengguna yang sedang login
    $userEmail = Auth::user()->email;

    // Ambil transaksi rumah yang user_email-nya sama dengan email pengguna yang login
    $transactions = RumahTransaction::with('rumah') // Pastikan relasi rumah sudah didefinisikan
        ->where('user_email', $userEmail) // Gunakan kolom 'user_email'
        ->latest()
        ->paginate(10); // Tampilkan 10 transaksi terbaru

    return view('payment.history', compact('transactions'));
}
public function updateStatus(Request $request)
{
    $request->validate([
        'transaction_id' => 'required|exists:rumah_transactions,id', // Validasi transaksi harus ada
    ]);

    $transaction = RumahTransaction::find($request->transaction_id);

    if ($transaction) {
        $transaction->payment_status = 'success'; // Ubah status menjadi success
        $transaction->save();

        return response()->json(['message' => 'Status pembayaran berhasil diperbarui.']);
    }

    return response()->json(['message' => 'Transaksi tidak ditemukan.'], 404);
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
