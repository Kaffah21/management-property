<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Villa;
use App\Models\Rumah;
class MasterController extends Controller
{
    public function index()
    {
        $rumahs = Rumah::latest()->take(6)->get();
        $villas = Villa::latest()->take(6)->get();
    
        return view('master', compact('rumahs', 'villas'));
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Melakukan pencarian di database (contohnya mencari di rumah dan villa)
        $rumahs = Rumah::where('nama', 'LIKE', "%{$query}%")
                        ->orWhere('lokasi', 'LIKE', "%{$query}%")
                        ->get();
    
        $villas = Villa::where('nama', 'LIKE', "%{$query}%")
                       ->orWhere('lokasi', 'LIKE', "%{$query}%")
                       ->get( );
    
        // Mengembalikan view dengan hasil pencarian
        return view('search-results', compact('rumahs', 'villas', 'query'));
    }
    
}
