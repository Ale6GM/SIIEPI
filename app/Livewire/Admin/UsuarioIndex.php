<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class UsuarioIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    
    public function updatingSearch() {
        $this->resetPage();
    }
    public function render()
    {
        $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')->orWhere('email', 'LIKE', '%' . $this->search . '%')->paginate();
        return view('livewire.admin.usuario-index', compact('usuarios'));
    }
}
