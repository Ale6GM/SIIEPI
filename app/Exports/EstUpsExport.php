<?php

namespace App\Exports;

use App\Models\Ups;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EstUpsExport implements FromView, WithStyles, WithEvents
{
    protected $areaId;

    public function __construct($areaId)
    {
        $this->areaId = $areaId;
    }
    public function view(): View
    {
        return view('admin.exports.estadisticas.ups', [
            'data' => Ups::where('area_id', $this->areaId)->get()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para el encabezado
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Ajustar el ancho de las columnas automáticamente
                foreach (range('A', $event->sheet->getHighestColumn()) as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
