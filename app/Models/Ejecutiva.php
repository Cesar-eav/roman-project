<?php

namespace App\Models;

use App\Models\CiaAseguradora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ejecutiva extends Model
{
    use HasFactory;

    public function cia(){
        return $this->belongsTo(CiaAseguradora::class);
    }
}
