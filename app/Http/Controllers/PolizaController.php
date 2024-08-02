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
        $cotizaciones = FormV1Liviano::with(['ejecutivas', 'cias'])
            ->orderBy('id', 'desc')
            ->get();


        return Inertia::render('Polizas/ShowCotizaciones', [
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

    public function deleteCotizacion($id)
    {
        $cotizacion = FormV1Liviano::find($id);
        $response = $cotizacion->delete();
        return $response;
    }

    public function cotizacionesV1(Request $request)
    {

        // return $request;
        $uniqueIdentifier = $this->generateUniqueIdentifier();
        $lastCotizacionId = FormV1Liviano::max('n_cotizacion') ?? 0;
        $lastCotizacionId = $lastCotizacionId+1;
        $tipo_cotizacion = $request->tipo_cotizacion;


        foreach ($request->vehicles as $vehicle) {

            if (count($request->companias) === 1) {
                $compania = $request->companias[0];
                $formulario = new FormV1Liviano();
                $formulario->marca = $vehicle['campos']['marca'] ?? '';
                $formulario->modelo = $vehicle['campos']['modelo'] ?? '';
                $formulario->patente = $vehicle['campos']['patente'] ?? '';
                $formulario->agnio = $vehicle['campos']['agnio'] ?? '';
                $formulario->n_chasis = $vehicle['campos']['n_chasis']?? '';
                $formulario->n_motor = $vehicle['campos']['n_motor']?? '';
                $formulario->color = $vehicle['campos']['color']?? '';
                $formulario->compania_id = $compania['ejecutivo']['cia_id']?? '';
                $formulario->ejecutivo_id = $compania['ejecutivo']['id']?? '';
                $formulario->monto_asegurado = $vehicle['campos']['monto_asegurado']?? '';
                $formulario->cantidad_de_asientos = $vehicle['campos']['cantidad_de_asientos']?? '';
                $formulario->origen = $vehicle['campos']['origen']?? '';
                $formulario->destino = $vehicle['campos']['destino']?? '';
                $formulario->tipo_de_carga = $vehicle['campos']['tipo_de_carga']?? '';
                $formulario->unique_identifier = $uniqueIdentifier;
                $formulario->n_cotizacion = $lastCotizacionId; // Incrementar manualmente el cotizacion_id
                $formulario->tipo_cotizacion = $tipo_cotizacion;
                $formulario->save();
            } else {
                // Si hay múltiples compañías, guarda una vez por cada compañía
                foreach ($request->companias as $compania) {
                    $formulario = new FormV1Liviano();
                    $formulario->marca = $vehicle['campos']['marca'] ?? '';
                    $formulario->modelo = $vehicle['campos']['modelo'] ?? '';
                    $formulario->patente = $vehicle['campos']['patente'] ?? '';
                    $formulario->agnio = $vehicle['campos']['agnio'] ?? '';
                    $formulario->n_chasis = $vehicle['campos']['n_chasis']?? '';
                    
                    $formulario->monto_asegurado = $vehicle['campos']['monto_asegurado']?? '';
                    $formulario->cantidad_de_asientos = $vehicle['campos']['cantidad_de_asientos']?? '';
                    $formulario->origen = $vehicle['campos']['origen']?? '';
                    $formulario->destino = $vehicle['campos']['destino']?? '';
                    $formulario->tipo_de_carga = $vehicle['campos']['tipo_de_carga']?? '';

                    $formulario->n_motor = $vehicle['campos']['n_motor']?? '';
                    $formulario->color = $vehicle['campos']['color']?? '';
                    $formulario->compania_id = $compania['ejecutivo']['cia_id']?? '';
                    $formulario->ejecutivo_id = $compania['ejecutivo']['id']?? '';
                    $formulario->unique_identifier = $uniqueIdentifier;
                    $formulario->n_cotizacion = $lastCotizacionId; // Incrementar manualmente el cotizacion_id
                    $formulario->save();
                }
            }
        }
         // Retornar la respuesta con el identificador único
    return response()->json(['FORMULARIO' => $formulario]);
    }

    private function generateUniqueIdentifier()
{
    $year = now()->year;
    $month = str_pad(now()->month, 2, '0', STR_PAD_LEFT);
    $day = str_pad(now()->day, 2, '0', STR_PAD_LEFT);
    $hour = str_pad(now()->hour, 2, '0', STR_PAD_LEFT);

    $uuid = (string) \Illuminate\Support\Str::uuid();

    return "COT-{$year}-{$month}-{$day}-{$hour}-{$uuid}";
}
}
