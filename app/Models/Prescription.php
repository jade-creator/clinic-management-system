<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'medication',
        'note',
        'patient_id',
        'doctor_id',
    ];

    public function patient() { return
        $this->belongsTo(Patient::class);
    }

    public function doctor() { return
        $this->belongsTo(Doctor::class);
    }

    public static function search($search)
    {
        $search = '%'.$search.'%';

        return empty($search) ? static::query()
            : static::where(function ($query) use ($search){
                return $query
                        ->where('id', 'LIKE', $search)
                        ->orWhere('medication', 'LIKE', $search)
                        ->orWhere('note', 'LIKE', $search)
                        ->orWhere('patient_id', 'LIKE', $search)
                        ->orWhere('doctor_id', 'LIKE', $search);
            });
    }
}
