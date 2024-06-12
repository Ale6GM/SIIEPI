<?php

namespace App\Livewire\Admin;

use App\Exports\EstRoturasPcExport;
use App\Models\Area;
use App\Models\Computadora;
use App\Models\Rotura;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class EstadisticasRoturas extends Component
{
    public $areas;
    public $roturas;
    public $selectedArea;
    public $selectedRotura;
    public $data = [];

    public function mount() {
        $this->areas = Area::all();
        $this->roturas = Rotura::all();
    }
    public function render()
    {
        if($this->selectedArea && $this->selectedRotura) {
            $this->data = Computadora::where('area_id', $this->selectedArea)->whereHas('roturas', function($query) {
                $query->where('rotura_id', $this->selectedRotura);
            })->get();
        }
        return view('livewire.admin.estadisticas-roturas');
    }

    public function export() {
        if($this->selectedArea && $this->selectedRotura) {
            return Excel::download(new EstRoturasPcExport($this->selectedArea, $this->selectedRotura), 'Estadisticas_roturas_pc.xlsx');
        }
    }
}
