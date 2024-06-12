<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoturaRequest;
use App\Models\Rotura;
use Illuminate\Http\Request;

class RoturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.roturas.index')->only('index');
        $this->middleware('can:admin.roturas.create')->only('create', 'store');
        $this->middleware('can:admin.roturas.edit')->only('edit','update');
        $this->middleware('can:admin.roturas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roturas = Rotura::all();
        return view('admin.roturas.index', compact('roturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoturaRequest $request)
    {
        $rotura = Rotura::create($request->all());

        session()->flash('alert', [
            'title' => 'Rotura Creada',
            'text' => 'La Rotura se ha creado Correctamente',
            'icon' => 'success'
        ]);


        return redirect()->route('admin.roturas.index');
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
    public function edit(Rotura $rotura)
    {
        return view('admin.roturas.edit', compact('rotura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoturaRequest $request, Rotura $rotura)
    {
        $rotura->update($request->all());

        session()->flash('alert', [
            'title' => 'Rotura Actualizada',
            'text' => 'La Rotura se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.roturas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rotura $rotura)
    {
        $rotura->delete();

        session()->flash('alert', [
            'title' => 'Rotura Eliminada',
            'text' => 'La Rotura se ha eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.roturas.index');
    }
}
