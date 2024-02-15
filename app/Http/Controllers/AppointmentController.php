<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AppointmentController extends Controller
{
    public function appointment($doctorID){
        
        $result = DB::select("SHOW COLUMNS FROM appointments WHERE Field = 'booking_time'");
        preg_match("/^enum\((.*)\)$/", $result[0]->Type, $matches);
    
        $appointments = array();
        foreach (explode(',', $matches[1]) as $value) {
            $appointments[] = trim($value, "'");
        }

     $appointments_not_Allow = Appointment::where('doctor_id',$doctorID )->pluck('booking_time');
        return view('doctor.appointment', compact('appointments', 'appointments_not_Allow'));

    }
    public function takeAppointment($doctorID){
        $result = DB::select("SHOW COLUMNS FROM appointments WHERE Field = 'booking_time'");
        preg_match("/^enum\((.*)\)$/", $result[0]->Type, $matches);
    
        $appointments = array();
        foreach (explode(',', $matches[1]) as $value) {
            $appointments[] = trim($value, "'");
        }

     $appointments_not_Allow = Appointment::where('doctor_id', $doctorID)->pluck('booking_time');
     
     $doctorID = $doctorID;
     
        return view('patient.appointment', compact('appointments', 'appointments_not_Allow', 'doctorID' ));
    }
    
    public function storeAppointment(Request $request)
    {
    
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'booking_time' => 'required',
            
        ]);

    
        $appointment = new Appointment();
        $appointment->doctor_id = $validatedData['doctor_id'];
        $appointment->patient_id = $validatedData['patient_id'];
        $appointment->booking_time = $validatedData['booking_time'];

        $appointment->save();
        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
    public function show($doctorId){
        $appointmentReserved = Appointment::where('doctor_id', $doctorId)->get();

        return view('doctor.reserved', compact('appointmentReserved' ));
    }
   
}