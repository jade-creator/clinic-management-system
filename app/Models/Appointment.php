<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_at',
        'remarks',
        'patient_id',
        'doctor_id',
        'status_id',
    ];

    public function patient() { return
        $this->belongsTo(Patient::class);
    }

    public function doctor() { return
        $this->belongsTo(Doctor::class);
    }

    public function status() { return
        $this->belongsTo(Status::class);
    }

    public static function search($search)
    {
        $search = '%'.$search.'%';

        return empty($search) ? static::query()
            : static::where(function ($query) use ($search){
                return $query->where('patient_id', 'LIKE', $search);
            });
    }
}
