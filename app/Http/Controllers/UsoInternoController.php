<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CiaAseguradora;
use App\Models\Poliza;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;



class UsoInternoController extends Controller
{

    public function listarUsuarios()
    {

        $clientes = User::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('Dashboard', [
            'clientes' => $clientes,

        ]);
    }

    public function listarCia()
    {
        $companies = CiaAseguradora::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ClienteExterno', [
            'companies' => $companies,
        ]);
    }

    public function showPolizas()
    {
     
        $polizas = Poliza::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowPolizas', [
            'polizas' => $polizas,
        ]);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $clientes = User::where('name', 'LIKE', "%{$query}%")
                           ->orWhere('rut', 'LIKE', "%{$query}%")
                           ->get();
        return response()->json($clientes);
    }

    public function usuarioCrear(Request $request)
    {

        $user = new User();
        $user->name =        $request->name;
        $user->email =       $request->email;
        $user->rut =         $request->rut;
        $user->telefono =    $request->telefono;
        $user->address =     $request->address;
        $user->ciudad =      $request->ciudad;
        $user->region =      $request->region;
        $user->rol_id =      $request->rol_id;
        $user->cargo =       $request->selectedCargo;
        $user->password =    Hash::make($request['password']);
        $user->save();

        return Inertia::render('Dashboard');
    }

    public function ViewAddPoliza()
    {
     
        $clientes = User::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('CrearPoliza', [
            'clientes' => $clientes

        ]);
    }

 
    public function polizaCrear(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_poliza' => 'required',
            'numero_poliza' => 'required',
            'monto_asegurado' => 'required',
            'prima' => 'required',
            'valor_neto' => 'required',
            'fecha_inicio' => 'required',
            'fecha_vencimiento' => 'required',
            'deducible' => 'required',
            'cantidad_cuotas' => 'required',
            'dia_pago' => 'required',
            'metodo_pago' => 'required',
            'aseguradora' => 'required',
            'vendedor' => 'required',
            'cliente_id' => 'required'
            // No necesitas validar los archivos seleccionados ya que Laravel maneja la subida de archivos automáticamente
        ]);

        $poliza = new Poliza();
        $poliza->tipo_poliza = $validatedData['tipo_poliza'];
        $poliza->numero_poliza = $validatedData['numero_poliza'];
        $poliza->monto_asegurado = $validatedData['monto_asegurado'];
        $poliza->prima = $validatedData['prima'];
        $poliza->valor_neto = $validatedData['valor_neto'];
        $poliza->fecha_inicio = $validatedData['fecha_inicio'];
        $poliza->fecha_vencimiento = $validatedData['fecha_vencimiento'];
        $poliza->deducible = $validatedData['deducible'];
        $poliza->cantidad_cuotas = $validatedData['cantidad_cuotas'];
        $poliza->dia_pago = $validatedData['dia_pago'];
        $poliza->metodo_pago = $validatedData['metodo_pago'];
        $poliza->aseguradora = $validatedData['aseguradora'];
        $poliza->vendedor = $validatedData['vendedor'];
        $poliza->cliente_id = $validatedData['cliente_id'];

        // Guarda la instancia de Poliza en la base de datos
        $poliza->save();

        if ($request->hasFile('archivos_seleccionados')) {
            // Recorre los archivos seleccionados y guárdalos en tu sistema de archivos o en la base de datos según sea necesario
            foreach ($request->file('archivos_seleccionados') as $archivo) {
                // Ejemplo de guardado de archivo en el sistema de archivos
                $archivo->store('archivos_poliza');
                // O ejemplo de guardado de archivo en la base de datos si tienes un modelo correspondiente
                // $archivoModelo = new ArchivoPoliza();
                // $archivoModelo->nombre = $archivo->getClientOriginalName();
                // $archivoModelo->ruta = $archivo->store('archivos_poliza');
                // $archivoModelo->poliza_id = $poliza->id;
                // $archivoModelo->save();
            }
        }

        return Inertia::render('CrearPoliza');
    }

}
