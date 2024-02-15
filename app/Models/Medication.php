<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',     
        'speciality_id', 
    ];


    public function specialty()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

}
