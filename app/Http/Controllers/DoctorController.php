<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\Medication;
use App\Models\consultation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        
        $medicationsCount = Medication::count();
        $specialtiesCount = Speciality::count();
        $consultationCount = Consultation::count();
       
        return view('doctor.dashboard',compact('medicationsCount','specialtiesCount','consultationCount'));
            
       
            
    }
    public function showMediCation(){
        $specialities = Speciality::all();
        $Medications = Medication::with('specialty')->get();
       
        return view('doctor.medication', compact('specialities', 'Medications'));
    }
  
}
