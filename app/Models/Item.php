<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'amount',
        'treatment_id',
        'payment_id',
    ];

    public function treatment() { return
        $this->belongsTo(Treatment::class);
    }

    public function payment() { return
        $this->belongsTo(Payment::class);
    }
}
