<?php

namespace App\Exports;

use App\Models\Poliza;
use Maatwebsite\Excel\Concerns\FromCollection;

class PolizasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Poliza::all();
    }


    
}
