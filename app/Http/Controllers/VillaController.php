<?php

namespace App\Http\Controllers;
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
    
}
