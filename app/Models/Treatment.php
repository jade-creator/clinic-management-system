<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'purchase_price',
        'selling_price',
        'category_id'
    ];

    public function category() { return
        $this->belongsTo(Category::class);
    }

    public function stock() { return
        $this->hasOne(Stock::class);
    }

    public function payments() { return
        $this->belongsToMany(Payment::class);
    }

    public static function search($search)
    {
        $search = '%'.$search.'%';

        return empty($search) ? static::query()
            : static::where(function ($query) use ($search){
                return $query
                        ->where('id', 'LIKE', $search)
                        ->orWhere('name', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('category_id', 'LIKE', $search);
            });
    }
}
