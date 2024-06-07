<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Rut',
            'Nombre',
            'Email',
            

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
            $user->rut,
            $user->name,

        ];
    }
}