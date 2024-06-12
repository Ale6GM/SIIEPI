<?php

namespace App\Exports;

use App\Models\Computadora;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EstSoPcExport implements FromView,  WithStyles, WithEvents
{
    protected $areaId;
    protected $sistemaId;

    public function __construct($areaId, $sistemaId)
    {
        $this->areaId = $areaId;
        $this->sistemaId = $sistemaId;
    }

    public function view(): View
    {
        return view('admin.exports.estadisticas.socomputadoras', [
            'data'=> Computadora::where('area_id', $this->areaId)->whereHas('sistemas', function($query) {
                $query->where('sistema_id', $this->sistemaId);
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
