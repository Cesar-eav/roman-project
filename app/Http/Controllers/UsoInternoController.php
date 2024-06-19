<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Banco;
use App\Models\Poliza;
use App\Models\Ejecutiva;
use App\Exports\CiasExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Exports\PolizasExport;
use App\Models\CiaAseguradora;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;

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



    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportCia()
    {
        return Excel::download(new CiasExport, 'cias-aseguradoras.xlsx');
    }

    public function exportPolizas()
    {
        return Excel::download(new PolizasExport, 'polizas.xlsx');
    }


    public function showCliente($id)
    {
        $cliente = User::where('id', $id)->first();
        return $cliente;
    }

    public function showCia($id)
    {
        $cia = CiaAseguradora::with(['banco', 'ejecutivas'])->where('id', $id)->first();
        return $cia;
    }

    public function editShowCliente($id)
    {
        $cliente = User::where('id', $id)->first();
        return $cliente;
    }

    public function deleteCliente($id)
    {
        $cliente = User::find($id);
        $response = $cliente->delete();
        return $response;
    }

    public function deleteCia($id)
    {
        $cia = CiaAseguradora::find($id);
        $response = $cia->delete();
        return $response;
    }


    public function editCliente(Request $request)
    {

        $updateData = $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'rut' => 'required|string|max:20|unique:users,rut,' . $request->id,
            'telefono' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'rol_id' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'afp' => 'required|string|max:255',
            'isapre' => 'required|string|max:255',
            'password' => 'nullable|string|min:3|same:password_confirm',
            'password_confirm' => 'nullable|string|min:3'
        ]);

        if (!empty($request->password)) {
            $updateData['password'] = Hash::make($request->password);
        }

        Log::info("message", $updateData);


        $cliente = User::find($request->id);
        $cliente->cargo =                 $request->cargo;
        $cliente->name = $request->name;
        $cliente->last_name = $request->last_name;
        $cliente->rut = $request->rut;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->address = $request->address;
        $cliente->ciudad = $request->ciudad;
        $cliente->region = $request->region;
        $cliente->isapre = $request->isapre;
        $cliente->afp = $request->afp;

        if (!empty($request->password)) {
            $cliente->password = $updateData['password'];
        }

        $response = $cliente->save();
        return $response;
    }


    public function editCia(Request $request)
    {

        $cia = CiaAseguradora::find($request->id);
        $cia->razon_social = $request->razon_social;
        $cia->nombre_fantasia = $request->nombre_fantasia;
        $cia->rut_empresa = $request->rut_empresa;
        $cia->direccion = $request->direccion;
        $cia->comuna = $request->comuna;
        $cia->region = $request->region;
        $cia->fono = $request->fono;
        $cia->mail = $request->mail;
        $cia->nombre_banco = $request->nombre_banco;
        $cia->banco_id = $request->banco_id;
        $cia->num_cuenta = $request->num_cuenta;
        $cia->representante_legal = $request->representante_legal;
        $cia->rut_representante = $request->rut_representante;
        $cia->mail_representante = $request->mail_representante;
        $cia->fono_representante = $request->fono_representante;
        $cia->nombre_gerente = $request->nombre_gerente;
        $cia->direccion_gerente = $request->direccion_gerente;
        $cia->comuna_gerente = $request->comuna_gerente;
        $cia->region_gerente = $request->region_gerente;
        $cia->fono_gerente = $request->fono_gerente;
        $cia->mail_gerente = $request->mail_gerente;
        $cia->fecha_nacimiento_gerente = $request->fecha_nacimiento_gerente;
        $cia->ejecutiva_1 = $request->ejecutiva_1;
        $cia->fono_ejecutiva_1 = $request->fono_ejecutiva_1;
        $cia->mail_ejecutiva_1 = $request->mail_ejecutiva_1;
        $cia->fecha_nacimiento_ejecutiva_1 = $request->fecha_nacimiento_ejecutiva_1;
        $cia->ejecutiva_2 = $request->ejecutiva_2;
        $cia->fono_ejecutiva_2 = $request->fono_ejecutiva_2;
        $cia->mail_ejecutiva_2 = $request->mail_ejecutiva_2;
        $cia->fecha_nacimiento_ejecutiva_2 = $request->fecha_nacimiento_ejecutiva_2;
        $cia->ejecutiva_3 = $request->ejecutiva_3;
        $cia->fono_ejecutiva_3 = $request->fono_ejecutiva_3;
        $cia->mail_ejecutiva_3 = $request->mail_ejecutiva_3;
        $cia->fecha_nacimiento_ejecutiva_3 = $request->fecha_nacimiento_ejecutiva_3;


        $response = $cia->save();
        return $response;

        // $cliente = User::where('id', $id)->first();
        //return $cliente;

    }

    public function guardarEditEjecutivaModal(Request $request){

        // return $request;

        $ejecutiva = Ejecutiva::find($request->id);
        $ejecutiva->name = $request->name;
        $ejecutiva->last_name = $request->last_name;
        $ejecutiva->email = $request->email;
        $ejecutiva->telefono = $request->telefono;
        $ejecutiva->fecha_nacimiento = $request->fecha_nacimiento;


        $response = $ejecutiva->save();
        return $response;

    }

    public function deleteEjecutivaModal($id){

        $ejecutiva = Ejecutiva::find($id);
        $response = $ejecutiva->delete();
        return $response;

    }


    public function guardarEjecutiva(Request $request)
    {

        $ejecutivasData = $request->input('ejecutivas', []);

        // return $ejecutivasData;
        $response = [];



        foreach ($ejecutivasData as $data) {

            $ejecutiva = new Ejecutiva();
            $ejecutiva->name = $data['name'];
            $ejecutiva->last_name = $data['last_name'];
            $ejecutiva->email = $data['email'];
            $ejecutiva->telefono = $data['telefono'];
            $ejecutiva->fecha_nacimiento = $data['fecha_nacimiento'];
            $ejecutiva->cia_id = $data['cia_id'];

            $ejecutiva->save();
            $response[] = $ejecutiva;
        }
    }

    public function showCias()
    {
        $companies = CiaAseguradora::with(['banco', 'ejecutivas'])
        ->orderBy('created_at', 'desc')
        ->get();
        $ejecutivasData = Ejecutiva::with('cia')->get();
     
        
        $bancos = Banco::get();

        return Inertia::render('ShowCias', [
            'companies' => $companies,
            'bancos' => $bancos,
            'ejecutivasData'=>$ejecutivasData
        ]);
    }

    //POLIZAZ
    public function showPolizas()
    {
        $clientes = User::all();
        $polizas = Poliza::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowPolizas', [
            'polizas' => $polizas,
            'clientes' => $clientes,
        ]);
    }

    public function editPoliza(Request $request)
    {
        $poliza = Poliza::find($request->id);
        $poliza->numero_poliza = $request->numero_poliza;
        $poliza->tipo_poliza = $request->tipo_poliza;
        $poliza->monto_asegurado = $request->monto_asegurado;
        $poliza->prima = $request->prima;
        $poliza->valor_neto = $request->valor_neto;
        $poliza->fecha_inicio = $request->fecha_inicio;
        $poliza->fecha_vencimiento = $request->fecha_vencimiento;
        $poliza->dia_pago = $request->dia_pago;
        $poliza->metodo_pago = $request->metodo_pago;
        $poliza->aseguradora = $request->aseguradora;

        $response = $poliza->save();
        return $response;
    }

    public function deletePoliza($id)
    {
        $poliza = Poliza::find($id);
        $response = $poliza->delete();

        return $response;
    }

    public function showPoliza($id)
    {
        $poliza = Poliza::where('id', $id)->first();
        return $poliza;
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


        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'selectedCargo' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'rut' => 'required|string|max:20|unique:users',
            'telefono' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'rol_id' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'afp' => 'required|string|max:255',
            'isapre' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed'

        ]);

        Log::info("message", $validate);


        // Crear una nueva instancia del modelo User
        $user = new User();
        $user->name = $request->name;
        $user->cargo = $request->selectedCargo;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->rut = $request->rut;
        $user->telefono = $request->telefono;
        $user->address = $request->address;
        $user->ciudad = $request->ciudad;
        $user->region = $request->region;
        $user->rol_id = $request->rol_id;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->afp = $request->afp;
        $user->isapre = $request->isapre;
        $user->password = Hash::make($request->password);

        // Guardar el usuario en la base de datos
        $user->save();

        return response()->json('Ok', 200);
    }

    public function ViewAddPoliza()
    {

        $clientes = User::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowPolizas', [
            'clientes' => $clientes

        ]);
    }


    public function ciaCrear(Request $request)
    {

        $validate = $request->validate([
            'razon_social' => 'required|string|max:255',
            'nombre_fantasia' => 'required|string|max:255',
            'rut_empresa' => 'required|string|max:15',
            'direccion' => 'required|string',
            'comuna' => 'required|string',
            'region' => 'required|string',
            'fono' => 'required|max:15',
            'mail' => 'required|email',
            'banco_id' => 'required|integer',

        ]);

        Log::info("message", $validate);
        $cia = new CiaAseguradora();
        $cia->razon_social = $request->razon_social;
        $cia->nombre_fantasia = $request->nombre_fantasia;
        $cia->rut_empresa = $request->rut_empresa;
        $cia->direccion = $request->direccion;
        $cia->comuna = $request->comuna;
        $cia->region = $request->region;
        $cia->fono = $request->fono;
        $cia->mail = $request->mail;
        $cia->nombre_banco = $request->nombre_banco;
        $cia->banco_id = $request->banco_id;
        $cia->num_cuenta = $request->num_cuenta;
        $cia->representante_legal = $request->representante_legal;
        $cia->apellidos_representante_legal = $request->apellidos_representante_legal;
        $cia->rut_representante = $request->rut_representante;
        $cia->mail_representante = $request->mail_representante;
        $cia->fono_representante = $request->fono_representante;
        $cia->nombre_gerente = $request->nombre_gerente;
        $cia->direccion_gerente = $request->direccion_gerente;
        $cia->comuna_gerente = $request->comuna_gerente;
        $cia->region_gerente = $request->region_gerente;
        $cia->fono_gerente = $request->fono_gerente;
        $cia->mail_gerente = $request->mail_gerente;
        $cia->fecha_nacimiento_gerente = $request->fecha_nacimiento_gerente;
        $cia->ejecutiva_1 = $request->ejecutiva_1;
        $cia->fono_ejecutiva_1 = $request->fono_ejecutiva_1;
        $cia->mail_ejecutiva_1 = $request->mail_ejecutiva_1;
        $cia->fecha_nacimiento_ejecutiva_1 = $request->fecha_nacimiento_ejecutiva_1;
        $cia->ejecutiva_2 = $request->ejecutiva_2;
        $cia->fono_ejecutiva_2 = $request->fono_ejecutiva_2;
        $cia->mail_ejecutiva_2 = $request->mail_ejecutiva_2;
        $cia->fecha_nacimiento_ejecutiva_2 = $request->fecha_nacimiento_ejecutiva_2;
        $cia->ejecutiva_3 = $request->ejecutiva_3;
        $cia->fono_ejecutiva_3 = $request->fono_ejecutiva_3;
        $cia->mail_ejecutiva_3 = $request->mail_ejecutiva_3;
        $cia->fecha_nacimiento_ejecutiva_3 = $request->fecha_nacimiento_ejecutiva_3;
        $cia->save();

        return Inertia::render('Dashboard');
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
        ]);

        $poliza = new Poliza();
        $poliza->tipo_poliza = $request->tipo_poliza;
        $poliza->numero_poliza = $request->numero_poliza;
        $poliza->monto_asegurado = $request->monto_asegurado;
        $poliza->prima = $request->prima;
        $poliza->valor_neto = $request->valor_neto;
        $poliza->fecha_inicio = $request->fecha_inicio;
        $poliza->fecha_vencimiento = $request->fecha_vencimiento;
        $poliza->deducible = $request->deducible;
        $poliza->cantidad_cuotas = $request->cantidad_cuotas;
        $poliza->dia_pago = $request->dia_pago;
        $poliza->metodo_pago = $request->metodo_pago;
        $poliza->aseguradora = $request->aseguradora;
        $poliza->vendedor = $request->vendedor;
        $poliza->cliente_id = $request->cliente_id;

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
