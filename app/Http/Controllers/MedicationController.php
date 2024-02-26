<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function store(Request $request)
    {
        
        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|exists:specialities,id',
        ]);

        
        $medication = new Medication();
        $medication->name = $validatedData['name'];
        $medication->speciality_id = $validatedData['specialty'];
        $medication->save();

            return redirect()->back()->with('success', 'Medication added successfully.');
    }


    public function destroy(Medication $Medication)
    {
        $Medication->delete();

    return redirect()->back()->with('success', 'Medication deleted successfully.');
    }


    public function update(Request $request, Medication $Medication)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:medications,name,' . $Medication->id,
            'speciality_id' => 'required|exists:specialities,id',

        ]);
      

        $Medication->update([
            'name' => $request->name,
            'speciality_id' => $request->speciality_id,
        ]);

        return redirect()->back()->with('success', 'Medication updated successfully.');
    }
}
