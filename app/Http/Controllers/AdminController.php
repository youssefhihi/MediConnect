<?php


namespace App\Http\Controllers;
use App\Models\Speciality;
use App\Models\Doctor;
use App\Models\Medication;
use Illuminate\Http\Request;


use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $doctorsCount = Doctor::count();
        $medicationsCount = Medication::count();
        $specialtiesCount = Speciality::count();
        return view('admin.index',compact('doctorsCount','medicationsCount','specialtiesCount'));
            
    }

    public function showSpeciality(){
        $specialities = Speciality::all();
        return view('admin.speciality', compact('specialities'));
    }

    public function showMediCationSpeciality(){
        $specialities = Speciality::all();
        $Medications = Medication::with('specialty')->get();
       
        return view('admin.medication', compact('specialities', 'Medications'));
    }

    /**
     * Display the Admin's profile form.
     */
    public function edit(Request $request): View
    {
        return view('AdminProfile.edit', [
            'user' => $request->user(),
        ]);
    }

   /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('AdminProfile.edit')->with('status', 'profile-updated');
    }
   

    
}
