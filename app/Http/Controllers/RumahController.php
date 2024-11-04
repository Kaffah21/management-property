<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    public function index()
    {
        $rumahs = Rumah::paginate(10); // Menampilkan 10 data per halaman
        return view('rumahs.index', compact('rumahs'));
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('rumahs.show', compact('rumah'));
    }
}
