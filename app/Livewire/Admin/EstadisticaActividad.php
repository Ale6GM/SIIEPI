<?php

namespace App\Livewire\Admin;

use App\Exports\EstActPcExport;
use App\Models\Actividad;
use App\Models\Area;
use App\Models\Computadora;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\This;

class EstadisticaActividad extends Component
{
    public $areas;
    public $actividades;
    public $selectedArea;   
    public $selectedActividad;
    public $data = [];

    public function mount() {
        $this->areas = Area::all();
        $this->actividades = Actividad::all();
    }
    public function render()
    {
        if($this->selectedArea && $this->selectedActividad) {
            $this->data = Computadora::where('area_id', $this->selectedArea)->whereHas('actividad', function($query) {
                $query->where('actividad_id', $this->selectedActividad);
            })->get();
        }
        return view('livewire.admin.estadistica-actividad');
    }

    public function export() {
        if($this->selectedArea && $this->selectedActividad) {
            return Excel::download(new EstActPcExport($this->selectedArea, $this->selectedActividad), 'Estadistica_Actividad.xlsx');
        }
    }
}
