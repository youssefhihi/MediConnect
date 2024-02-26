<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities'; 
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    public function medications()
    {
        return $this->hasMany(Medication::class, 'speciality_id');
    }
    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'speciality_id');
    }
}

