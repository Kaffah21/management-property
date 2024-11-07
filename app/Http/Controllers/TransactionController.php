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
}
