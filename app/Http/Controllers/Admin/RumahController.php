<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rumah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RumahController extends Controller
{
    public function index()
    {
        $rumahs = Rumah::paginate(5); // Menampilkan 10 data per halaman
        return view('admin.rumah.index', compact('rumahs'));
    }

    public function create()
    {
        return view('admin.rumah.create');
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

        $rumah = new Rumah();
        $rumah->nama = $request->nama;
        $rumah->harga = $request->harga;
        $rumah->lokasi = $request->lokasi;
        $rumah->rating = $request->rating;
        $rumah->deskripsi = $request->deskripsi;

        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('rumah', $imageName, 'public'); 
            $rumah->gambar = $imageName; // Save the filename in the database
        }

        $rumah->save();

        return redirect()->route('admin.rumah.index')->with('success', 'Rumah created successfully.');
    }

    public function edit($id)
    {
        $property = Rumah::findOrFail($id);
        return view('admin.rumah.edit', compact('property'));
    }
    
    public function update(Request $request, $id)
    {
        $property = Rumah::findOrFail($id);
    
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'lokasi' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048', // Optional, validate file type and size
        ]);
    
        if ($request->hasFile('gambar')) {
            // Handle file upload
            $filePath = $request->file('gambar')->store('public/rumah');
            $validatedData['gambar'] = str_replace('public/', '', $filePath);
        }
    
        $property->update($validatedData);
    
        return redirect()->route('admin.rumah.index')->with('success', 'Home property updated successfully.');
    }
    

    public function destroy(Rumah $rumah)
    {
        Storage::delete('public/rumah/' . $rumah->gambar);
        $rumah->delete();
        return redirect()->route('admin.rumah.index')->with('success', 'Home property delete successfully');
    }
}
