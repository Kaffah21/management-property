<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumahTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'rumah_id',
        'user_name',
        'user_email',
        'guests',
        'check_in',
        'check_out',
        'total_price',
        'payment_status',
    ];

public function rumah()
{
    return $this->belongsTo(Rumah::class);
}

}
