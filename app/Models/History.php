<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'note',
        'patient_id'
    ];

    public function patient() { return
        $this->belongsTo(Patient::class);
    }
}
