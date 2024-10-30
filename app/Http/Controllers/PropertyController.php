<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // Logic to show properties (Rumah)
        return view('admin.rumah.index');
    }

    public function villaIndex()
    {
        // Logic to show properties (Villa)
        return view('admin.villa.index');
    }
}
