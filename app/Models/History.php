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

    public static function search($search)
    {
        $search = '%'.$search.'%';

        return empty($search) ? static::query()
            : static::where(function ($query) use ($search){
                return $query
                        ->where('id', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('note', 'LIKE', $search)
                        ->orWhere('patient_id', 'LIKE', $search);
            });
    }
}
