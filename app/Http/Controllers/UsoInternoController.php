<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;



class UsoInternoController extends Controller
{

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
}
