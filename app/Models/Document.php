<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date',
        'description',
        'name',
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
                        ->where('patient_id', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('name', 'LIKE', $search);
            });
    }
}
