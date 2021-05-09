<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'birthdate',
        'sex',
        'phone_number',
        'address',
        'user_id',
    ];

    public function user(){ return
        $this->belongsTo(User::class);
    }
}
