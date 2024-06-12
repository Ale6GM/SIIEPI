<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Computadora;
use Livewire\WithPagination;

class PcIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;
    public function render()
    {
        $computadoras = Computadora::where('ip', 'LIKE', '%' . $this->search . '%')->orWhere('trabajo', 'LIKE', '%' . $this->search . '%')->paginate();
        return view('livewire.admin.pc-index', compact('computadoras'));
    }
}
