<?php

namespace App\Http\Controllers;
use App\Models\Speciality;


use Illuminate\Http\Request;

class SpecialityController extends Controller
{

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Speciality' => 'required|string|max:255|unique:specialities,name',
    ]);

    Speciality::create([
        'name' => $request->Speciality, 
    ]);

    return redirect()->back()->with('success', 'Specialty added successfully.');
}


    public function destroy(Speciality $specialty)
    {
        $specialty->delete();

    return redirect()->back()->with('success', 'Specialty deleted successfully.');
    }


    public function update(Request $request, Speciality $specialty)
    {
        $validatedData = $request->validate([
            'Speciality' => 'required|string|max:255|unique:specialities,name,' . $specialty->id,
        ]);
       // dd($request);

        $specialty->update([
            'name' => $request->Speciality,
        ]);

        return redirect()->back()->with('success', 'Specialty updated successfully.');
    }
}
