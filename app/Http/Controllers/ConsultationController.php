<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\consultation;
use App\Models\Doctor;
use App\Models\Medication;
use App\Models\Appointment;
use App\Models\Speciality;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Appointment   $appointment)
    {    
         $doctorId = Auth::user()->doctor->id;
        $doctor = Doctor::findOrFail($doctorId);
         $specialtyId = $doctor->specialty->id;
         $medications = Speciality::find($specialtyId)->medications;
        return view('doctor.consultation',compact('appointment','medications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'symptoms' => 'required|string',
            'NumOfDays' => 'required|numeric',
            'medications' => 'required|array', 
            'appointment_id' => 'required|exists:appointments,id', 
        ]);
    

        $consultation = new Consultation();
        $consultation->patient_id = $validatedData['patient_id'];
        $consultation->doctor_id = Auth::user()->doctor->id;
        $consultation->symptoms = $validatedData['symptoms'];
        $consultation->NumOfDays = $validatedData['NumOfDays'];
        $consultation->appointment_id = $validatedData['appointment_id'];
        $consultation->save();
      $consultation->medications()->attach($validatedData['medications']);
        return redirect()->route('dashboard')->with('success', 'Consultation added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       $patientId = Auth::user()->patient->id;

       $consultations = Consultation::where('patient_id', $patientId)->get();

     return view('patient.certificate', compact('consultations'));
    }
    public function showForDoctor()
    {
       $doctorId = Auth::user()->doctor->id;

       $consultations = Consultation::where('doctor_id', $doctorId)->get();

       return view('doctor.medicalRecords', compact('consultations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(consultation $consultation)
    {
        //
    }
}
