<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $transactions = Transaction::where('user_id', Auth::id())->get();
            return view('payment.history', compact('transactions'));
        } else {
            return redirect()->route('login')->with('error', 'Please login to view your transactions.');
        }
    }
    public function showTransactionDetail($id)
{
    $transaction = Transaction::with('villa')->findOrFail($id); // Fetch transaction with associated villa

    // Assuming `totalPrice` and `checkOutDate` are properties of the transaction
    $totalPrice = $transaction->total_price;
    $checkOutDate = $transaction->check_out_date; // Or set it based on your logic

    return view('payment.success', compact('transaction', 'totalPrice', 'checkOutDate'));
}

}
