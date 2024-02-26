<?php

namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
            
    }
    public function SpecialtiesDoctors(){
        $specialties = Speciality::limit(5)->get();
        $doctors = Doctor::all();
       
        return view('patient.home', compact('specialties','doctors'));
    }
}
