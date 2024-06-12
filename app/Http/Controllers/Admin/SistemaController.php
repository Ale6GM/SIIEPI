<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SistemaStoreRequest;
use App\Models\Sistema;
use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.sistemas.index')->only('index');
        $this->middleware('can:admin.sistemas.create')->only('create', 'store');
        $this->middleware('can:admin.sistemas.edit')->only('edit','update');
        $this->middleware('can:admin.sistemas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sistemas = Sistema::all();
        return view('admin.sistemas.index', compact('sistemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sistemas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SistemaStoreRequest $request)
    {
        $sistemas = Sistema::create($request->all());

        session()->flash('alert', [
            'title' => 'Sistema Creado',
            'text' => 'El Sistema se ha creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.sistemas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistema $sistema)
    {
        return view('admin.sistemas.edit', compact('sistema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SistemaStoreRequest $request, Sistema $sistema)
    {
        $sistema->update($request->all());

        session()->flash('alert', [
            'title' => 'Sistema Actualizado',
            'text' => 'El Sistema se ha actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.sistemas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistema $sistema)
    {
        $sistema->delete();

        session()->flash('alert', [
            'title' => 'Sistema Eliminado',
            'text' => 'El Sistema se ha Eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.sistemas.index');
    }
}
