<?php

namespace App\Http\Controllers;
use App\Models\consultation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generate($certificate)
    {
         $consultation = Consultation::find($certificate);
        //  $pdf = Pdf::loadView('patient.exporte', compact('consultation'));
        //  return $pdf->download('certificateMedical.pdf');
         //return view('patient.exporte', compact('consultation'));

    }
}
