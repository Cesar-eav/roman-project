<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\FormV1Liviano;

class PDFController extends Controller
{

    public function viewPDF($id)
    {
        $cotizacion = FormV1Liviano::with(['ejecutivas','cias'])
        ->where('id', $id)
        ->first();

        return view('pdf_view', compact('cotizacion'));


      }

    public function generatePDF($id)
    {
        $cotizacion = FormV1Liviano::with(['ejecutivas','cias'])
        ->where('id', $id)
        ->first();

        $data = [
            'title' => 'Vehículo motorizado liviano',
            'cotizacion' => $cotizacion

        ];


        $pdf = PDF::loadView('pdf_view', $data);
        
        return $pdf->download('document.pdf');
    }
}
