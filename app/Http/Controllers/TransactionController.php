<?php

namespace App\Http\Controllers;
use App\Models\VillaTransaction;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function paymentHistory()
    {
        // Ambil semua transaksi yang diurutkan berdasarkan waktu terbaru
        $transactions = VillaTransaction::with('villa')->latest()->paginate(10);
    
        return view('payment.history', compact('transactions'));
    }

}
