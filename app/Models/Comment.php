<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
         'comment',
        'patientID',
        'doctorID',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function patientComment()
    {
        return $this->belongsTo(Comment::class,'patient_id');
    }
}