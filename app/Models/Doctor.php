<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user() { return
        $this->belongsTo(User::class);
    }

    public function appointments() { return
        $this->hasMany(Appointment::class);
    }

    public function prescriptions() { return
        $this->hasMany(Prescription::class);
    }

    public static function search($search)
    {
        $search = '%'.$search.'%';

        return empty($search) ? static::query()
            : static::where(function ($query) use ($search){
                return $query->where('id', 'LIKE', '%'.$search.'%');
            });
    }
}
