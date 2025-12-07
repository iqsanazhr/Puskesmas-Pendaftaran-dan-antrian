<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poly extends Model
{
    protected $fillable = ['name', 'description'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }
}
