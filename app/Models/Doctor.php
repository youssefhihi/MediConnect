<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'speciality_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function specialty()
    {
        return $this->belongsTo(Speciality::class,'speciality_id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointement::class,'doctor_id');
    }
    public function consultation()
    {
        return $this->hasMany(Consultation::class,'doctor_id');
    }
    public function favorites()
        {
            return $this->hasMany(Favorite::class);
        }
}
