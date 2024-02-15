<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Medication;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.dashboard');
            
    }
    public function showMediCation(){
        $specialities = Speciality::all();
        $Medications = Medication::with('specialty')->get();
       
        return view('doctor.medication', compact('specialities', 'Medications'));
    }
}
