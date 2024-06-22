<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Mail\PDFMail;
use App\Models\PolizaForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PolizaController extends Controller
{
    public function crearCotizacion()
    {
        $polizas_form = PolizaForm::all();

        
        return Inertia::render('Polizas/CrearCotizacion',[
            'polizas_form' => $polizas_form
        ]);
    }


}
