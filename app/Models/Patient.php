<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'dateOfBirth',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointment()
    {
        return $this->haseOne(Appointment::class);
    }
    public function comment()
    {
        return $this->haseMany(Comment::class,'patient_id');
    }

}
