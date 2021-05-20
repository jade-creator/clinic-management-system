<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_deposit',
        'amount_deposit',
        'isCash',
        'payment_id'
    ];

    public function payment() { return
        $this->belongsTo(Payment::class);
    }
}
