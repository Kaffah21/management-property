<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Rumah;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        $rumah = Rumah::find($request->property_id); 
        $totalPrice = $request->total_price; 
        $snapToken = $request->snapToken; 

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'property_id' => $rumah->id,
            'total_price' => $totalPrice,
            'status' => 'pending', 
        ]);

        return view('payment.view', compact('transaction', 'snapToken'));
    }
    public function midtransCallback(Request $request)
    {
        $transaction = Transaction::where('transaction_id', $request->order_id)->first();
        if ($transaction) {
            $transaction->update(['status' => $request->transaction_status]);
        }
        return response()->json(['status' => 'success']);
    }

    public function userTransactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('payment.history', compact('transactions'));
    }

    public function adminTransactions()
{
    $transactions = Transaction::with('user', 'property')->get();
    return view('admin.transaksi.rumah', compact('transactions'));
}

}
 