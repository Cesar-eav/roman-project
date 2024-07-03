<?php

namespace App\Exports;

use App\Models\Empresa;
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

class EmpresasExport implements FromCollection, WithHeadings, WithMapping, WithEvents, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Empresa::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'RAZÓN SOCIAL',
            'NOMBRE FANTASÍA',
            'NOMBRES PERSONA NATURAL',
            'APELLIDO PATERNO PERSONA NATURAL',
            'APELLIDO MATERNO PERSONA NATURAL',
            'RUT EMPRESA/PERSONA',
            'DIRECCIÓN',
            'COMUNA',
            'REGIÓN',
            'TELÉFONO',
            'CORREO',
            'ID BANCO',
            'NOMBRE BANCO',
            'NÚMERO CUENTA',
            'REPRESENTANTE LEGAL',
            'RUT REPRESENTANTE LEGAL',
            'CORREO REPRESENTANTE LEGAL',
            'TELÉFONO REPRESENTANTE LEGAL',
        ];
    }

    /**
     * @param mixed $empresa
     *
     * @return array
     */
    public function map($empresa): array
    {
        return [
            strtoupper($empresa->razon_social),
            strtoupper($empresa->nombre_fantasia),
            strtoupper($empresa->nombres_persona_natural),
            strtoupper($empresa->apellido_paterno_persona_natural),
            strtoupper($empresa->apellido_materno_persona_natural),
            strtoupper($empresa->rut_empresa_persona),
            strtoupper($empresa->direccion),
            strtoupper($empresa->comuna),
            strtoupper($empresa->region),
            strtoupper($empresa->fono),
            strtoupper($empresa->mail),
            $empresa->banco_id, // ID Banco no necesita strtoupper
            strtoupper($empresa->nombre_banco),
            strtoupper($empresa->numero_cuenta),
            strtoupper($empresa->representante_legal),
            strtoupper($empresa->rut_representante_legal),
            strtoupper($empresa->mail_representante_legal),
            strtoupper($empresa->fono_representante_legal),
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:R1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'color' => ['argb' => '040BA8'],
                    ],
                ]);

                $event->sheet->getDelegate()->getStyle('A2:R'.$event->sheet->getDelegate()->getHighestRow())
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
                foreach (range('A', 'R') as $columnID) {
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



