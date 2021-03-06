<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category',
        'description'
    ];

    public function treatments() { return
        $this->hasMany(Treatment::class);
    }

    public static function search($search)
    {
        $search = '%'.$search.'%';

        return empty($search) ? static::query()
            : static::where(function ($query) use ($search){
                return $query
                        ->where('id', 'LIKE', $search)
                        ->orWhere('name', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search);
            });
    }
}
