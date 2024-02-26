<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    protected $fillable = [
        'numOfDays',
        'created_at',
        'symptoms',
        'doctor_id',
        'patient_id',
    ];

      
        public function patient()
        {
            return $this->belongsTO(Patient::class,'patient_id');
        }
        public function doctor()
        {
            return $this->belongsTO(Doctor::class,'doctor_id');
        }
        public function appointment()
        {
            return $this->belongsTo(Appointment::class,'appointment_id');
        }
        public function medications()
        {
            return $this->belongsToMany(Medication::class, 'consultation_medication', 'consultation_id', 'medication_id');
        }
}
