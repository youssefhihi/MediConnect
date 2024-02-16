<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ListFavoritesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/invoice', [InvoiceController::class, 'generate']);

Route::middleware(['auth'])->group(function () { 
                    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'editImage'])->name('ImageProfile.update');
                
});



Route::middleware(['auth', 'role:doctor'])->group(function () { 
                // CRUD MEDICATION
    Route::get('/dashboard/medication', [DoctorController::class, 'showMediCation'])->name('DoctorMedication'); 
    Route::post('/dashboard/medication', [MedicationController::class, 'store'])->name('AddMedicationD');
    Route::delete('/dashboard/Medication/{Medication}', [MedicationController::class, 'destroy'])->name('deleteMedicationD');
    Route::put('/dashboard/Medication/{Medication}', [MedicationController::class, 'update'])->name('editMedicationD');
         //appointment  
    Route::get('/dashboard/appointment/{doctorID}', [AppointmentController::class, 'appointment'])->name('DoctorAppointment');
    Route::get('/appointment/appointment_reserved/{doctorId}', [AppointmentController::class, 'show'])->name('appointment.show');
               //consultation
     Route::get('/dashboard/consultation/{appointment}', [ConsultationController::class, 'index'])->name('consultation');
     Route::post('/dashboard/consultation/AddConsultation', [ConsultationController::class, 'store'])->name('consultation.store');

            Route::get('/dashboard', function () {
                return view('doctor.dashboard');
            })->name('dashboard');
});

Route::middleware(['auth', 'role:patient'])->group(function () {

    Route::get('/', [HomeController::class, 'SpecialtiesDoctors'])->name('patient');
    Route::get('/doctor/appointment/{doctorID}', [AppointmentController::class, 'takeAppointment'])->name('PatientAppointment');
    Route::post('/appointment', [AppointmentController::class, 'storeAppointment'])->name('appointment');
    Route::get('/doctors/{specialty}', [PatientController::class, 'filterDoctors'])->name('doctor.sort');
    Route::get('/doctor/{doctorId}', [PatientController::class, 'doctorProfile'])->name('doctor.profile');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/listFavorites', [ListFavoritesController::class, 'store'])->name('favorite.store');
    Route::delete('/listFavorites', [ListFavoritesController::class, 'destroy'])->name('favorite.delete');
    Route::get('/patient/certificate', [ConsultationController::class, 'show'])->name('certificate.show');
  
});

Route::middleware(['auth', 'role:admin'])->group(function () {
                // CRUD of Specialty
    Route::get('/admin/speciality', [AdminController::class, 'showSpeciality'])->name('speciality');
    Route::delete('/admin/speciality/{specialty}', [SpecialityController::class, 'destroy'])->name('deleteSpeciality');
    Route::put('/admin/speciality/{specialty}', [SpecialityController::class, 'update'])->name('editSpeciality');
    Route::post('/admin/speciality', [SpecialityController::class, 'store'])->name('AddSpeciality');
                 // CRUD of Medication
    Route::get('/admin/medication', [AdminController::class, 'showMediCationSpeciality'])->name('medication');
    Route::post('/admin/medication', [MedicationController::class, 'store'])->name('AddMedication');
    Route::delete('/admin/Medication/{Medication}', [MedicationController::class, 'destroy'])->name('deleteMedication');
    Route::put('/admin/Medication/{Medication}', [MedicationController::class, 'update'])->name('editMedication');
                       //statistiques
     Route::get('/admin', [AdminController::class, 'index'])->name('admin');            

    
    
    
});


require __DIR__.'/auth.php';
