<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'villa_id',
        'order_id',
        'user_name',
        'user_email',
        'guests',
        'check_in',
        'check_out',
        'total_price',
        'payment_status',
    ];

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
