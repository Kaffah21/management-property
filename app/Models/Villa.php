<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'lokasi',
        'rating',
        'deskripsi',
        'gambar'
    ];
}
