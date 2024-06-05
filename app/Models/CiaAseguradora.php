<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiaAseguradora extends Model
{
    use HasFactory;

    protected $table = 'cia_seguros';

    public function banco(){
        return $this->belongsTo(Banco::class);
    }
}
