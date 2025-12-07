<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nik',
        'name',
        'dob',
        'address',
        'phone',
        'gender',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
