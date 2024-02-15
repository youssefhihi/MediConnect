<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
       'doctor_id',
       'patient_id',
       'booking_time',
       'date',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
