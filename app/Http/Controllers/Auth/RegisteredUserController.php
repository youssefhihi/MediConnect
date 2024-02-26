<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Speciality;
use Carbon\Carbon;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specialities = Speciality::all();
        return view('auth.register', compact('specialities'));
        
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:patient,doctor'],
            'specialty' => ['required_if:role,doctor', 'exists:specialities,id'],
            'birthday' => $request->role == 'patient' ? ['required', 'date'] : [],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'picture_id' => null ,
        ]);
            
            if ($validatedData['role'] === 'doctor') {
                if(isset($validatedData['specialty'])){
                    $user->doctor()->create([
                        'user_id' => $user->id,  
                        'speciality_id' => $validatedData['specialty']
                        
                    ]);
                }else{
                    return back()->withInput()->withErrors(['spetiality' => 'Please choose your Sptiality .']);
                }
                
            }
            
            if ($validatedData['role'] === 'patient') {
                $birthday = Carbon::parse($validatedData['birthday']);
                $today = now();
                if(isset($validatedData['birthday'])){
                    if ($birthday->gt($today)) { 
                        return back()->withInput()->withErrors(['birthDate' => 'Date of your birthday is invalid. Please try again.']);
                    } else {
                        $user->patient()->create([
                            'user_id' => $user->id,  
                            'dateOfBirth' => $validatedData['birthday']      
                        ]);
                    } 
                }else{
                    return back()->withInput()->withErrors(['birthDate' => 'Please choose your birthday. ']);
                }     
            }
            
            
        event(new Registered($user));

        Auth::login($user);

        return $request->role == 'doctor' ? redirect('/dashboard') : redirect('/');
    }
}
