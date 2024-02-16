<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    protected $fillable = [
        'numOfDays',
        'symptoms',
        'doctor_id',
        'patient_id',
    ];

            public function medications()
        {
            return $this->belongsToMany(Medication::class);
        }
}
