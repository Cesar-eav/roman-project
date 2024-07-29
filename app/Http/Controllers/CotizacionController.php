<?php

namespace App\Http\Controllers;

use App\Models\FormV1Liviano;
use Illuminate\Http\Request;


class CotizacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            // validaciones
        ]);

        $cotizacion = new FormV1Liviano([
            // otros campos
        ]);

        $cotizacion->save();

        // Asignar vehículos a la cotización
        foreach ($request->vehicles as $vehicle) {
            $cotizacion->vehicles()->create($vehicle);
        }

        return response()->json(['cotizacion' => $cotizacion], 201);
    }
}
