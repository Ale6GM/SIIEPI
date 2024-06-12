<?php

namespace App\Livewire\Admin;

use App\Exports\EstPcExport;
use App\Exports\EstUpsExport;
use App\Models\Actividad;
use App\Models\Area;
use App\Models\Computadora;
use App\Models\Ups;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\This;

class Estadistica extends Component
{
    public $areas;
    public $selectedArea;
    public $selectedItem;
    public $data = [];

    public function mount() {
        $this->areas = Area::all();
    }

    
    public function render()
    {
        if($this->selectedArea && $this->selectedItem === 'pc') {
            $this->data = Computadora::where('area_id', $this->selectedArea)->get();
        } elseif($this->selectedArea && $this->selectedItem === 'ups') {
            $this->data = Ups::where('area_id', $this->selectedArea)->get();
        }
        return view('livewire.admin.estadistica');
    }

    public function export() {
        if($this->selectedItem === 'pc') {
            return Excel::download(new EstPcExport($this->selectedArea), 'estadisticas_pc.xlsx');
        } elseif($this->selectedItem === 'ups') {
            return Excel::download(new EstUpsExport($this->selectedArea), 'estadisticas_ups.xlsx');
        }
    }
}
