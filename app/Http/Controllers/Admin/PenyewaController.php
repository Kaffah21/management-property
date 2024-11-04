<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewa = Penyewa::all();
        return view('admin.penyewa.index', compact('penyewa'));
    }

    public function create()
    {
        return view('admin.penyewa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:penyewa,email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
    
        Penyewa::create($request->all());
    
        return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa created successfully');
    }
    

    public function edit(Penyewa $penyewa)
    {
        return view('admin.penyewa.edit', compact('penyewa'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $penyewa->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:penyewa,email,' . $penyewa->id,
            'phone' => 'required|string',
            'address' => 'required|string',
        ]));

        return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa updated successfully');
    }

    public function destroy(Penyewa $penyewa)
    {
        $penyewa->delete();
        return redirect()->route('admin.penyewa.index')->with('success', 'Penyewa deleted successfully');
    }
}
