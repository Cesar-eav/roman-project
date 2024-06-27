<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Mail\PDFMail;
use App\Models\Ejecutiva;
use App\Models\PolizaForm;
use Illuminate\Http\Request;
use App\Models\CiaAseguradora;
use App\Models\FormV1Liviano;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PolizaController extends Controller
{
    public function crearCotizacion()
    {
        $formularios = PolizaForm::all();
        $companias = CiaAseguradora::with(['ejecutivas'])
        ->get();

   
        return Inertia::render('Polizas/CrearCotizacion', [
            'formularios' => $formularios,
            'companias' => $companias
        ]);
    }

    public function getCompanies()
    {
        $companies = CiaAseguradora::with(['ejecutivas'])
        ->get();
        return response()->json($companies);
    }


    public function getEjecutivas()
    {
        $ejecutivas = Ejecutiva::get();
        return response()->json($ejecutivas);
    }

    public function cotizacionesV1(Request $request)
    {
        // dd($request->vehicles[0]['campos']['marca']);

        $formulario = new FormV1Liviano();

        $formulario->marca = $request->vehicles[0]['campos']['marca'];
        $formulario->modelo = $request->vehicles[0]['campos']['modelo'];
        $formulario->patente = $request->vehicles[0]['campos']['patente'];
        $formulario->agnio = $request->vehicles[0]['campos']['agnio'];
        $formulario->n_chasis = $request->vehicles[0]['campos']['n_chasis'];
        $formulario->n_motor = $request->vehicles[0]['campos']['n_motor'];
        $formulario->color = $request->vehicles[0]['campos']['color'];
        $formulario->save();
    }
}
