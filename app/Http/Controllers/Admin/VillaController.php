<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillaController extends Controller
{
    public function index()
    {
        $villas = Villa::latest()->paginate(10);
        return view('admin.villas.index', compact('villas'));
    }

    public function create()
    {
        return view('admin.villas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'lokasi' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:5',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules
        ]);
    
        $villa = new Villa();
        $villa->nama = $request->nama;
        $villa->harga = $request->harga;
        $villa->lokasi = $request->lokasi;
        $villa->rating = $request->rating;
        $villa->deskripsi = $request->deskripsi;
    
        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('villas', $imageName, 'public'); // Store in storage/app/public/villas
            $villa->gambar = $imageName; // Save the filename in the database
        }
    
        $villa->save();
    
        return redirect()->route('admin.villas.index')->with('success', 'Villa created successfully.');
    }
    
    

    public function edit(Villa $villa)
    {
        return view('admin.villas.edit', compact('villa'));
    }

    public function update(Request $request, Villa $villa)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'rating' => 'required|numeric|min:0|max:5',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        if ($request->hasFile('gambar')) {
            Storage::delete('public/villas/' . $villa->gambar);
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/villas', $gambar->hashName());
    
            $villa->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'lokasi' => $request->lokasi,
                'rating' => $request->rating,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambar->hashName()
            ]);
        } else {
            $villa->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'lokasi' => $request->lokasi,
                'rating' => $request->rating,
                'deskripsi' => $request->deskripsi
            ]);
        }
    
        return redirect()->route('admin.villas.index')->with('success', 'Villa berhasil diupdate');
    }

    public function destroy(Villa $villa)
    {
        Storage::delete('public/villas/'.$villa->gambar);
        $villa->delete();
        return redirect()->route('admin.villas.index')->with('success', 'Villa berhasil dihapus');
    }
}