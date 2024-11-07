<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionRumah extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'rumah_id', 'check_in', 'check_out', 'guests', 'total_price', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}
