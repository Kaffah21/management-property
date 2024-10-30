<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $table = 'rumahs'; // Ensure this matches your database table name

    // Specify fillable fields if needed
    protected $fillable = ['nama', 'harga', 'lokasi', 'rating', 'deskripsi', 'gambar'];
}
