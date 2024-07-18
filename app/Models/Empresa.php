<?php

namespace App\Models;

use App\Models\Banco;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;

public function banco(){
    return $this->hasOne(Banco::class,  'id', 'banco_id');
}
}
