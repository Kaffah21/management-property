<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function index()
    {
        $pemilik = Pemilik::all();
        return view('admin.pemilik.index', compact('pemilik'));
    }

    public function create()
    {
        return view('admin.pemilik.create');
    }

    public function store(Request $request)
    {
        Pemilik::create($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pemilik',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]));

        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik created successfully');
    }

    public function edit(Pemilik $pemilik)
    {
        return view('admin.pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, Pemilik $pemilik)
    {
        $pemilik->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pemilik,email,' . $pemilik->id,
            'phone' => 'required|string',
            'address' => 'required|string',
        ]));

        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik updated successfully');
    }

    public function destroy(Pemilik $pemilik)
    {
        $pemilik->delete();
        return redirect()->route('admin.pemilik.index')->with('success', 'Pemilik deleted successfully');
    }
}
