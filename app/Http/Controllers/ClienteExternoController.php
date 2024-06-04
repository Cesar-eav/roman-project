<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\UsuarioExterno;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ClienteExternoController extends Controller
{

    public function showEmpresas()
    {
        $empresas = Empresa::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowEmpresas', [
            'empresas' => $empresas,

        ]);
    }

    public function showEmpresa($id)
    {
        $empresa = Empresa::where('id',$id)->first();
        return $empresa;
    }

    public function editShowEmpresa ($id){
        
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
        $cliente = UsuarioExterno::where('id',$id)->first();
        return $cliente;
    }

    public function deleteEmpresa ($id){
        $empresa = Empresa::find($id);
        $response = $empresa->delete();
        return $response;
     }

     public function deleteUsuarioExterno ($id){
        $usuario_externo = UsuarioExterno::find($id);
        $response = $usuario_externo->delete();
        return $response;
     }
    
    public function guardarClienteExterno(Request $request)
    {

        //    Validar los datos del formulario
        //    $request-> $request->validate([
        // 'nivelEjecutivo' => 'nullable|string|max:255',
        // 'nombres' => 'nullable|string|max:255',
        // 'apellidoPaterno' => 'nullable|string|max:255',
        // 'apellidoMaterno' => 'nullable|string|max:255',
        // 'rut' => 'nullable|string|max:255',
        // 'fechaNacimiento' => 'nullable|date',
        // 'fono' => 'nullable|string|max:255',
        // 'mail' => 'nullable|string|email|max:255',
        // 'direccion' => 'nullable|string|max:255',
        // 'comuna' => 'nullable|string|max:255',
        // 'region' => 'nullable|string|max:255',
        // 'isapre' => 'nullable|string|max:255',
        // 'afp' => 'nullable|string|max:255',
        // ]);

        // Crear una nueva instancia de Empresa y asignar los valores
        $usuarioExterno = new UsuarioExterno();
        $usuarioExterno->nivel_ejecutivo = $request->nivelEjecutivo;
        $usuarioExterno->nombres = $request->nombres;
        $usuarioExterno->apellido_paterno = $request->apellidoPaterno;
        $usuarioExterno->apellido_materno = $request->apellidoMaterno;
        $usuarioExterno->rut = $request->rut;
        $usuarioExterno->fecha_nacimiento = $request->fechaNacimiento;
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
