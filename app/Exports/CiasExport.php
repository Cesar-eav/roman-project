<?php

namespace App\Exports;

use App\Models\CiaAseguradora;
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

class CiasExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithStyles
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
            'RAZÓN SOCIAL',
            'NOMBRE FANTASÍA',
            'RUT EMPRESA',
            'DIRECCIÓN',
            'COMUNA',
            'REGIÓN',
            'TELÉFONO',
            'CORREO',
            'NOMBRE BANCO',
            'NÚMERO DE CTA',
            'REPRESENTANTE LEGAL',
            'RUT REPRESENTANTE',
            'CORREO REPRESENTANTE',
            'TELÉFONO REPRESENTANTE',
            'NOMBRE GERENTE',
            'DIRECCIÓN GERENTE',
            'COMUNA GERENTE',
            'REGIÓN GERENTE',
            'TELÉFONO GERENTE',
            'CORREO GERENTE',
            'FECHA NACIMIENTO GERENTE',
            'EJECUTIVA 1',
            'FONO EJECUTIVA 1',
            'CORREO EJECUTIVA 1',
            'FECHA NACIMIENTO EJECUTIVA 1',
            'EJECUTIVA 2',
            'FONO EJECUTIVA 2',
            'CORREO EJECUTIVA 2',
            'FECHA NACIMIENTO EJECUTIVA 2',
            'EJECUTIVA 3',
            'FONO EJECUTIVA 3',
            'CORREO EJECUTIVA 3',
            'FECHA NACIMIENTO EJECUTIVA 3',
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
            strtoupper($user->razon_social),
            strtoupper($user->nombre_fantasia),
            strtoupper($user->rut_empresa),
            strtoupper($user->direccion),
            strtoupper($user->comuna),
            strtoupper($user->region),
            strtoupper($user->fono),
            strtoupper($user->mail),
            strtoupper($user->nombre_banco),
            strtoupper($user->num_cuenta),
            strtoupper($user->representante_legal),
            strtoupper($user->rut_representante),
            strtoupper($user->mail_representante),
            strtoupper($user->fono_representante),
            strtoupper($user->nombre_gerente),
            strtoupper($user->direccion_gerente),
            strtoupper($user->comuna_gerente),
            strtoupper($user->region_gerente),
            strtoupper($user->fono_gerente),
            strtoupper($user->mail_gerente),
            $user->fecha_nacimiento_gerente, // Fechas no necesitan strtoupper
            strtoupper($user->ejecutiva_1),
            strtoupper($user->fono_ejecutiva_1),
            strtoupper($user->mail_ejecutiva_1),
            $user->fecha_nacimiento_ejecutiva_1, // Fechas no necesitan strtoupper
            strtoupper($user->ejecutiva_2),
            strtoupper($user->fono_ejecutiva_2),
            strtoupper($user->mail_ejecutiva_2),
            $user->fecha_nacimiento_ejecutiva_2, // Fechas no necesitan strtoupper
            strtoupper($user->ejecutiva_3),
            strtoupper($user->fono_ejecutiva_3),
            strtoupper($user->mail_ejecutiva_3),
            $user->fecha_nacimiento_ejecutiva_3, // Fechas no necesitan strtoupper
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
                        'color' => ['argb' => '040BA8'],
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



