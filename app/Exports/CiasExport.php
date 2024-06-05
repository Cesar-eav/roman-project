<?php

namespace App\Exports;

use App\Models\CiaAseguradora;
use Maatwebsite\Excel\Concerns\FromCollection;

class CiasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CiaAseguradora::all();
    }
}
