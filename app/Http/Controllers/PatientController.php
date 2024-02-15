<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\Comment;
use App\Models\listFavorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    public function filterDoctors(Speciality $specialty) {
        $doctors = Doctor::whereHas('specialty', function($query) use ($specialty) {
            $query->where('id', $specialty->id);
        })->get();
    
        return view('patient.doctor', compact('doctors'));
    }
    
   
    public function doctorProfile($doctorId) {
        $doctor = Doctor::findOrFail($doctorId);
        $doctorID = $doctorId;
        $comments = Comment::where('doctor_id', $doctorId)->get();
        $commentCount = Comment::where('doctor_id', $doctorId)->count();

        $patientID = Auth::user()->patient->id;
    
        $doctorIsFavorite = listFavorites::where('doctor_id', $doctorID)->where('patient_id', $patientID)->exists();   
        $favoritesCount = listFavorites::where('doctor_id', $doctorID)->count();                
        return view('patient.doctorPage', compact('doctor','doctorID','comments','commentCount','doctorIsFavorite','favoritesCount'));
    }
       
   
}
