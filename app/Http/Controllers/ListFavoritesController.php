<?php

namespace App\Http\Controllers;

use App\Models\listFavorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListFavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            
            'patientID' => 'required|int',
            'doctorID' => 'required|int',
           
        ]);
    
       
        $favorites = new listFavorites();
        
        $favorites->doctor_id = $validatedData['doctorID']; 
        $favorites->patient_id = $validatedData['patientID']; 
        $favorites->save();
        return redirect()->back()->with('success', 'Doctor added to List favorites successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {


    $patientId = Auth::user()->patient->id;
    
    $favorites = listFavorites::where('patient_id', $patientId)->get();
    
    return view('patient.favorite', compact('favorites'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(listFavorites $listFavorites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, listFavorites $listFavorites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        $doctorID = $request->input('doctorID');
        $patientID = $request->input('patientID');

        $favorite = listFavorites::where('doctor_id', $doctorID)
                            ->where('patient_id', $patientID)
                            ->delete();
    return redirect()->back()->with('success', 'Doctor added to List favorites successfully.');                 
    }
}
