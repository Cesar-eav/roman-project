<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CiaAseguradora;
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



    public function ciaCrear(Request $request)
    {
     
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
        $cia->save();

        return Inertia::render('Dashboard');
    }

    
}
