<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_total',
        'isPercent',
        'discount',
        'grand_total',
        'patient_id',
    ];

    public function patient() { return
        $this->belongsTo(Patient::class);
    }

    public function treatments() { return 
        $this->belongsToMany(Treatment::class)
            ->withTimestamps()
            ->withPivot(['quantity', 'amount']);
    }

    public function deposits() { return
        $this->hasMany(Deposit::class);
    }
}
