<?php

namespace App\Exports;

use App\Models\Poliza;
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

class PolizasExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Poliza::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'TIPO DE PÓLIZA',
            'NÚMERO DE PÓLIZA',
            'MONTO ASEGURADO',
            'PRIMA',
            'VALOR NETO',
            'FECHA DE INICIO',
            'FECHA DE VENCIMIENTO',
            'DEDUCIBLE',
            'CANTIDAD DE CUOTAS',
            'DÍA DE PAGO',
            'MÉTODO DE PAGO',
            'ASEGURADORA',
            'VENDEDOR',
        ];
    }

    /**
     * @param mixed $poliza
     *
     * @return array
     */
    public function map($poliza): array
    {
        return [
            strtoupper($poliza->tipo_poliza),
            strtoupper($poliza->numero_poliza),
            $poliza->monto_asegurado, // Campos numéricos no necesitan strtoupper
            $poliza->prima,
            $poliza->valor_neto,
            $poliza->fecha_inicio, // Fechas no necesitan strtoupper
            $poliza->fecha_vencimiento,
            $poliza->deducible,
            $poliza->cantidad_cuotas, // Campos numéricos no necesitan strtoupper
            strtoupper($poliza->dia_pago),
            strtoupper($poliza->metodo_pago),
            strtoupper($poliza->aseguradora),
            strtoupper($poliza->vendedor),
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
