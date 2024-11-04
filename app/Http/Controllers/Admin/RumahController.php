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
        $rumahs = Rumah::paginate(10); // Menampilkan 10 data per halaman
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

    public function edit(Rumah $rumah)
    {
        return view('admin.rumah.edit', compact('rumah'));
    }

    public function update(Request $request, Rumah $rumah)
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
            Storage::delete('public/rumah/' . $rumah->gambar);
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/rumah', $gambar->hashName());

            $rumah->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'lokasi' => $request->lokasi,
                'rating' => $request->rating,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambar->hashName()
            ]);
        } else {
            $rumah->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'lokasi' => $request->lokasi,
                'rating' => $request->rating,
                'deskripsi' => $request->deskripsi
            ]);
        }

        return redirect()->route('admin.rumah.index')->with('success', 'Rumah berhasil diupdate');
    }

    public function destroy(Rumah $rumah)
    {
        Storage::delete('public/rumah/' . $rumah->gambar);
        $rumah->delete();
        return redirect()->route('admin.rumah.index')->with('success', 'Rumah berhasil dihapus');
    }
}
