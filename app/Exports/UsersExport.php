<?php

namespace App\Exports;

use App\Models\User;
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

class UsersExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithStyles
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
            'Apellido',
            'Correo',
            'Telefono',
            'Dirección',
            'Comuna',
            'Región',
            'Cargo',
            'Isapre',
            'Afp'
            

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
            $user->last_name,
            $user->email,
            $user->telefono,
            $user->address,
            $user->ciudad,
            $user->region,
            $user->cargo,
            $user->isapre,
            $user->afp

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => 'F97316'],
                    ],
                ]);

                $event->sheet->getDelegate()->getStyle('A2:K'.$event->sheet->getDelegate()->getHighestRow())
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
                foreach (range('A', 'K') as $columnID) {
                    $event->sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
            // 'A1' => ['font' => ['italic' => true]],
            // Styling an entire column.
            // 'A'  => ['font' => ['bold' => true]],
        ];
    }
}
