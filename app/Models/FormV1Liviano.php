<?php

namespace App\Models;

use App\Models\Ejecutiva;
use App\Models\CiaAseguradora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormV1Liviano extends Model
{
    use HasFactory;

    protected $table = 'formulario_vehiculo_motorizado_liviano';

    public function ejecutivas(){
        return $this->hasMany(Ejecutiva::class,  'id', 'ejecutivo_id',);

    }

    public function cias(){
        return $this->hasMany(CiaAseguradora::class,  'id', 'compania_id',);

    }


}
