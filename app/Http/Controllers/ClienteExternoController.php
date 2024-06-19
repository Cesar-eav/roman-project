<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Comuna;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Models\UsuarioExterno;
use App\Exports\EmpresasExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientesExternosExport;


class ClienteExternoController extends Controller
{

    public function showEmpresas()
    {
        $empresas = Empresa::all();
        $comunas = Comuna::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowEmpresas', [
            'empresas' => $empresas,
            'comunas' => $comunas

        ]);
    }



    public function exportEmpresas()
    {
        return Excel::download(new EmpresasExport, 'empresas.xlsx');
    }

    public function exportClienteExterno()
    {
        return Excel::download(new ClientesExternosExport, 'clientes-externos.xlsx');
    }

    public function showEmpresa($id)
    {
        $empresa = Empresa::where('id', $id)->first();
        return $empresa;
    }

    public function editShowEmpresa($id)
    {

        $empresa = Empresa::where('id', $id)->first();
        return $empresa;
    }

    public function editEmpresa(Request $request)
    {

        $empresa = Empresa::find($request->id);
        $empresa->id = $request->id;
        $empresa->razon_social = $request->razon_social;
        $empresa->nombre_fantasia = $request->nombre_fantasia;
        $empresa->nombres_persona_natural = $request->nombres_persona_natural;
        $empresa->apellido_paterno_persona_natural = $request->apellido_paterno_persona_natural;
        $empresa->apellido_materno_persona_natural = $request->apellido_materno_persona_natural;
        $empresa->rut_empresa_persona = $request->rut_empresa_persona;
        $empresa->direccion = $request->direccion;
        $empresa->comuna = $request->comuna;
        $empresa->region = $request->region;
        $empresa->fono = $request->fono;
        $empresa->mail = $request->mail;
        $empresa->nombre_banco = $request->nombre_banco;
        $empresa->numero_cuenta = $request->numero_cuenta;
        $empresa->representante_legal = $request->representante_legal;
        $empresa->rut_representante_legal = $request->rut_representante_legal;
        $empresa->mail_representante_legal = $request->mail_representante_legal;
        $empresa->fono_representante_legal = $request->fono_representante_legal;
        $empresa->fecha_nacimiento = $request->fecha_nacimiento_gerente;

        // Guardar la empresa en la base de datos
        $response = $empresa->save();
        // Redireccionar o devolver una respuesta
        return $response;
    }


    public function editUsuarioExterno(Request $request)
    {

        $updateData = $request->validate([
            'id' => 'required|integer|exists:usuarios_externos,id', // Ajusta las reglas según tus necesidades
            'nivel_ejecutivo' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'rut' => 'required|string|max:20|unique:usuarios_externos,rut,' . $request->id,
            'fecha_nacimiento' => 'required|date',
            'fono' => 'required|string|max:20',
            'mail' => 'required|string|email|max:255|unique:usuarios_externos,mail,' . $request->id,
            'direccion' => 'required|string|max:255',
            'comuna' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'isapre' => 'required|string|max:255',
            'afp' => 'required|string|max:255',

        ]);


        $usuarioExterno = UsuarioExterno::find($request->id);
        $usuarioExterno->id = $request->id;
        $usuarioExterno->nivel_ejecutivo = $request->nivel_ejecutivo;
        $usuarioExterno->nombres = $request->nombres;
        $usuarioExterno->apellido_paterno = $request->apellido_paterno;
        $usuarioExterno->apellido_materno = $request->apellido_materno;
        $usuarioExterno->rut = $request->rut;
        $usuarioExterno->fecha_nacimiento = $request->fecha_nacimiento;
        $usuarioExterno->fono = $request->fono;
        $usuarioExterno->mail = $request->mail;
        $usuarioExterno->direccion = $request->direccion;
        $usuarioExterno->comuna = $request->comuna;
        $usuarioExterno->region = $request->region;
        $usuarioExterno->isapre = $request->isapre;
        $usuarioExterno->afp = $request->afp;

        // Guardar la empresa en la base de datos
        $response = $usuarioExterno->save();
        // Redireccionar o devolver una respuesta
        return $response;
    }

    public function showClientesExternos()
    {
        $usuarios_externos = UsuarioExterno::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowUsuarioExterno', [
            'usuarios_externos' => $usuarios_externos,

        ]);
    }

    public function showClienteExterno($id)
    {
        $cliente = UsuarioExterno::where('id', $id)->first();
        return $cliente;
    }

    public function deleteEmpresa($id)
    {
        $empresa = Empresa::find($id);
        $response = $empresa->delete();
        return $response;
    }

    public function deleteUsuarioExterno($id)
    {
        $usuario_externo = UsuarioExterno::find($id);
        $response = $usuario_externo->delete();
        return $response;
    }

    public function guardarEmpresa(Request $request)
    {


        $empresa = new Empresa();

        $empresa->razon_social = $request->razon_social;
        $empresa->nombre_fantasia = $request->nombre_fantasia;
        $empresa->nombres_persona_natural = $request->nombres_persona_natural;
        $empresa->apellido_paterno_persona_natural = $request->apellido_paterno_persona_natural;
        $empresa->apellido_materno_persona_natural = $request->apellido_materno_persona_natural;
        $empresa->rut_empresa_persona = $request->rut_empresa_persona;
        $empresa->direccion = $request->direccion;
        $empresa->comuna = $request->comuna;
        $empresa->region = $request->region;
        $empresa->fono = $request->fono;
        $empresa->mail = $request->mail;
        $empresa->nombre_banco = $request->nombre_banco;
        $empresa->numero_cuenta = $request->numero_cuenta;
        $empresa->representante_legal = $request->representante_legal;
        $empresa->rut_representante_legal = $request->rut_representante_legal;
        $empresa->mail_representante_legal = $request->mail_representante_legal;
        $empresa->fono_representante_legal = $request->fono_representante_legal;
        $empresa->fecha_nacimiento = $request->fecha_nacimiento;
        $empresa->banco_id = $request->banco_id;

        return $empresa->save();
    }

    public function guardarClienteExterno(Request $request)
    {

        // Validar los datos del formulario
        $validate = $request->validate([
            'nivel_ejecutivo' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'rut' => 'required|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'fono' => 'nullable|string|max:255',
            'mail' => 'required|string|email|max:255',
            'direccion' => 'nullable|string|max:255',
            'comuna' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'isapre' => 'nullable|string|max:255',
            'afp' => 'nullable|string|max:255',
        ]);

        Log::info("message", $validate);

        // Crear una nueva instancia de Empresa y asignar los valores
        $usuarioExterno = new UsuarioExterno();
        $usuarioExterno->nivel_ejecutivo = $request->nivel_ejecutivo;
        $usuarioExterno->nombres = $request->nombres;
        $usuarioExterno->apellido_paterno = $request->apellido_paterno;
        $usuarioExterno->apellido_materno = $request->apellido_materno;
        $usuarioExterno->rut = $request->rut;
        $usuarioExterno->fecha_nacimiento = $request->fecha_nacimiento;
        $usuarioExterno->fono = $request->fono;
        $usuarioExterno->mail = $request->mail;
        $usuarioExterno->direccion = $request->direccion;
        $usuarioExterno->comuna = $request->comuna;
        $usuarioExterno->region = $request->region;
        $usuarioExterno->isapre = $request->isapre;
        $usuarioExterno->afp = $request->afp;


        // Guardar la empresa en la base de datos
        return $usuarioExterno->save();
    }
}
