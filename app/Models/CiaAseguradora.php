<?php

namespace App\Models;

use App\Models\Banco;
use App\Models\Ejecutiva;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CiaAseguradora extends Model
{
    use HasFactory;

    protected $table = 'cia_seguros';

    public function banco(){
        return $this->belongsTo(Banco::class);
    }

    public function ejecutivas(){
        return $this->hasMany(Ejecutiva::class, 'id', 'cia_id');
    }
}
