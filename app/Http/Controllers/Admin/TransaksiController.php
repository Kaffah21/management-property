<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransaksiController extends Controller
{
    public function index()
    {
        // Mengambil data transaksi rumah dari database
        $transactions = Transaction::with('property')->whereHas('property', function ($query) {
            $query->where('type', 'rumah'); // Pastikan ada kolom `type` di tabel `properties` untuk membedakan rumah/villa
        })->get();

        // Return ke view admin transaksi
        return view('admin.transaksi.rumah', compact('transactions'));
    }
}
