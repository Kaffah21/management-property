<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'user_id',
        'property_id',
        'total_price',
        'status',
    ];

    public function villa()
{
    return $this->belongsTo(Villa::class);
}

 // Mendefinisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mendefinisikan relasi dengan model Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
