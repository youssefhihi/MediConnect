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
      
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class,'appointment_id');
    }
  
}
