<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'treatment_id',
    ];

    public function treatment() { return
        $this->belongsTo(Treatment::class);
    }
}
