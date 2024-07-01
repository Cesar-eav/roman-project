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

    public function showCotizaciones()
    {
        $cotizaciones = FormV1Liviano::with(['ejecutivas','cias'])
        ->orderBy('id', 'desc')
        ->get();
    

        return Inertia::render('Polizas/ShowCotizaciones',[
            'cotizaciones' => $cotizaciones
            
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

        foreach ($request->vehicles as $vehicle) {
            foreach ($request->companias as $compania) {
                $formulario = new FormV1Liviano();
    
                $formulario->marca = $vehicle['campos']['marca'];
                $formulario->modelo = $vehicle['campos']['modelo'];
                $formulario->patente = $vehicle['campos']['patente'];
                $formulario->agnio = $vehicle['campos']['agnio'];
                $formulario->n_chasis = $vehicle['campos']['n_chasis'];
                $formulario->n_motor = $vehicle['campos']['n_motor'];
                $formulario->color = $vehicle['campos']['color'];
                $formulario->compania_id = $compania['ejecutivo']['cia_id'];
                $formulario->ejecutivo_id = $compania['ejecutivo']['id'];
    
                $formulario->save();
            }
        }
    }
}
