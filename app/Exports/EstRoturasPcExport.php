<?php

namespace App\Exports;

use App\Models\Computadora;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EstRoturasPcExport implements FromView, WithStyles, WithEvents
{
    protected $areaId;
    protected $roturaId;

    public function __construct($areaId, $roturaId)
    {
        $this->areaId = $areaId;
        $this->roturaId = $roturaId;
    }

    public function view(): View
    {
        return view('admin.exports.estadisticas.roturascomputadoras', [
            'data' => Computadora::where('area_id', $this->areaId)->whereHas('roturas', function($query) {
                $query->where('rotura_id', $this->roturaId);
            })->get()
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
