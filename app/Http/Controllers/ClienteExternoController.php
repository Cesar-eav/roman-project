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


    public function guardarEmpresa(Request $request)
    {

        //    Validar los datos del formulario
        //    $request-> $request->validate([
        //     'razon_social' => 'required|string|max:255',
        //     'nombre_fantasia' => 'required|string|max:255',
        //     'nombres_persona_natural' => 'required|string|max:255',
        //     'apellido_paterno_persona_natural' => 'required|string|max:255',
        //     'apellido_materno_persona_natural' => 'required|string|max:255',
        //     'rut_empresa_persona' => 'required|string|max:255',
        //     'direccion' => 'required|string|max:255',
        //     'comuna' => 'required|string|max:255',
        //     'region' => 'required|string|max:255',
        //     'fono' => 'required|string|max:20',
        //     'mail' => 'required|string|email|max:255',
        //     'nombre_banco' => 'required|string|max:255',
        //     'numero_cuenta' => 'required|string|max:255',
        //     'representante_legal' => 'required|string|max:255',
        //     'rut_representante_legal' => 'required|string|max:255',
        //     'mail_representante_legal' => 'required|string|email|max:255',
        //     'fono_representante_legal' => 'required|string|max:20',
        //     'fecha_nacimiento' => 'required|date',
        // ]);

        // Crear una nueva instancia de Empresa y asignar los valores
        $empresa = new Empresa();
        $empresa->razon_social = $request->razonSocial;
        $empresa->nombre_fantasia = $request->nombreFantasia;
        $empresa->nombres_persona_natural = $request->nombresPersonaNatural;
        $empresa->apellido_paterno_persona_natural = $request->apellidoPaternoPersonaNatural;
        $empresa->apellido_materno_persona_natural = $request->apellidoMaternoPersonaNatural;
        $empresa->rut_empresa_persona = $request->rutEmpresaPersona;
        $empresa->direccion = $request->direccion;
        $empresa->comuna = $request->comuna;
        $empresa->region = $request->region;
        $empresa->fono = $request->fono;
        $empresa->mail = $request->mail;
        $empresa->nombre_banco = $request->nombreBanco;
        $empresa->numero_cuenta = $request->numeroCuenta;
        $empresa->representante_legal = $request->representanteLegal;
        $empresa->rut_representante_legal = $request->rutRepresentanteLegal;
        $empresa->mail_representante_legal = $request->mailRepresentanteLegal;
        $empresa->fono_representante_legal = $request->fonoRepresentanteLegal;
        $empresa->fecha_nacimiento = $request->fechaNacimiento;

        // Guardar la empresa en la base de datos
        $empresa->save();
        // Redireccionar o devolver una respuesta
        return redirect()->route('crear-empresa')->with('success', 'Empresa creada exitosamente.');
    }


    public function showClienteExterno()
    {
        $usuarios_externos = UsuarioExterno::all();
        // Pasar los datos a la vista Dashboard usando Inertia
        return Inertia::render('ShowUsuarioExterno', [
            'usuarios_externos' => $usuarios_externos,

        ]);
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
