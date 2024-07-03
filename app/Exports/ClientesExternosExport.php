<?php

namespace App\Exports;

use App\Models\User;
use App\Models\UsuarioExterno;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClientesExternosExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithStyles

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UsuarioExterno::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'NIVEL EJECUTIVO',
            'NOMBRES',
            'APELLIDO PATERNO',
            'APELLIDO MATERNO',
            'RUT',
            'FECHA DE NACIMIENTO',
            'TELÉFONO',
            'CORREO',
            'DIRECCIÓN',
            'COMUNA',
            'REGIÓN',
            'ISAPRE',
            'AFP'
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
            strtoupper($user->nivel_ejecutivo),
            strtoupper($user->nombres),
            strtoupper($user->apellido_paterno),
            strtoupper($user->apellido_materno),
            strtoupper($user->rut),
            $user->fecha_nacimiento, // Fecha no necesita strtoupper
            strtoupper($user->fono),
            strtoupper($user->mail),
            strtoupper($user->direccion),
            strtoupper($user->comuna),
            strtoupper($user->region),
            strtoupper($user->isapre),
            strtoupper($user->afp)
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:M1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => '040BA8'],
                    ],
                ]);

                $event->sheet->getDelegate()->getStyle('A2:M'.$event->sheet->getDelegate()->getHighestRow())
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => 'FF000000'],
                            ],
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_LEFT,
                        ],
                    ]);

                // Ajustar el ancho de las columnas automáticamente
                foreach (range('A', 'M') as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo de la primera fila en negrita.
            1 => ['font' => ['bold' => true]],
        ];
    }
}
