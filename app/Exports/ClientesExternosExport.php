<?php

namespace App\Exports;

use App\Models\UsuarioExterno;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientesExternosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UsuarioExterno::all();
    }
}
