<?php

namespace App\Exports;

use App\Models\CiaAseguradora;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CiasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CiaAseguradora::all();
    }
    /**
     * @return array
     */

    public function headings(): array
    {
        return [
            'Razon Social',
            'Nombre Fantasía',
            'Rut empresa',
            'Dirección',
            'Comuna',
            'Region',
            'Telefono',
            'Correo',
            'Nombre Banco',
            'Numero de Cta',
            'Representante legal',
            'Rut Representante',
            'Correo Representante',
            'Telefono Representante',
            'Nombre Gerente',
            'Direccion Gerente',
            'Comuna Gerente',
            'Región Gerente',
            'Telefono Gerente',
            'Correo Gerente',
            'Fecha nacimiento gerente',
            'Ejecutiva 1',
            'Fono ejecutiva 1',
            'Correo ejecutiva 1',
            'Fecha nacimiento ejecutiva 1',
            'Ejecutiva 2',
            'Fono ejecutiva 2',
            'Correo ejecutiva 2',
            'Fecha nacimiento ejecutiva 2',

        ];
    }

        /**
     * @param mixed $user
     *
     * @return array
     */
    
    public function map($user): array
    {
        return [
            $user->razon_social,
            $user->nombre_fantasia,
            $user->rut_empresa,
            $user->direccion,
            $user->comuna,
            $user->region,
            $user->fono,
            $user->mail,
            $user->nombre_banco,
            $user->banco_id,
            $user->num_cuenta,
            $user->representante_legal,
            $user->rut_representante,
            $user->mail_representante,
            $user->fono_representante,
            $user->nombre_gerente,
            $user->direccion_gerente,
            $user->comuna_gerente,
            $user->region_gerente,
            $user->fono_gerente,
            $user->mail_gerente,
            $user->fecha_nacimiento_gerente,
            $user->ejecutiva_1,
            $user->fono_ejecutiva_1,
            $user->mail_ejecutiva_1,
            $user->fecha_nacimiento_ejecutiva_1,
            $user->ejecutiva_2,
            $user->fono_ejecutiva_2,
            $user->mail_ejecutiva_2,
            $user->fecha_nacimiento_ejecutiva_2,
            $user->ejecutiva_3,
            $user->fono_ejecutiva_3,
            $user->mail_ejecutiva_3,
            $user->fecha_nacimiento_ejecutiva_3,

        ];
    }
}
