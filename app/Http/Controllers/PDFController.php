<?php

namespace App\Http\Controllers;

use PDF;

use Illuminate\Http\Request;
use App\Models\FormV1Liviano;
use App\Models\CiaAseguradora;

class PDFController extends Controller
{
    public function generatePDF($id)
    {

        $cotizacion = FormV1Liviano::with(['ejecutivas','cias'])
        ->where('id', $id)
        ->first();

        $data = [
            'title' => 'Cotización Roman Seguros',
            'cotizacion' => $cotizacion

        ];
        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('document.pdf');
    }
}
