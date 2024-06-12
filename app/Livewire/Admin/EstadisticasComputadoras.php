<?php

namespace App\Livewire\Admin;

use App\Exports\EstSoPcExport;
use App\Models\Area;
use App\Models\Computadora;
use App\Models\Sistema;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class EstadisticasComputadoras extends Component
{
    public $areas;
    public $sistemas;
    public $selectedSistema;
    public $selectedArea;
    public $data=[];

    public function mount() {
        $this->areas = Area::all();
        $this->sistemas = Sistema::all();
    }
    public function render()
    {
        if($this->selectedArea && $this->selectedSistema) {
            $this->data = Computadora::where('area_id', $this->selectedArea)->whereHas('sistemas', function($query) {
                $query->where('sistema_id', $this->selectedSistema);
            })->get();
        }
        return view('livewire.admin.estadisticas-computadoras');
    }

    public function export() {
        if($this->selectedArea && $this->selectedSistema) {
            return Excel::download(new EstSoPcExport($this->selectedArea, $this->selectedSistema), 'Estadisticas_SO.xlsx');
        }
    }
}
