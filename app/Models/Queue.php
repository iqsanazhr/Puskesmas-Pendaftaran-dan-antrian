<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = ['patient_id', 'poly_id', 'doctor_id', 'number', 'date', 'status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function poly()
    {
        return $this->belongsTo(Poly::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
