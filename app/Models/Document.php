<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'name',
        'patient_id'
    ];

    public function patient() { return
        $this->belongsTo(Patient::class);
    }
}
