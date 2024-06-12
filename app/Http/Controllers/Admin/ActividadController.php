<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActividadStoreRequest;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.actividades.index')->only('index');
        $this->middleware('can:admin.actividades.create')->only('create', 'store');
        $this->middleware('can:admin.actividades.edit')->only('edit','update');
        $this->middleware('can:admin.actividades.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    // esta funcion coge la
    public function index()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actividades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActividadStoreRequest $request)
    {
        $actividad = Actividad::create($request->all());

        session()->flash('alert', [
            'title' => 'Actividad Creada',
            'text' => 'La Actividad se ha creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.actividades.index');
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
    public function edit(Actividad $actividade)
    {
        return view('admin.actividades.edit', compact('actividade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActividadStoreRequest $request, Actividad $actividade)
    {
        $actividade-> update($request->all());

        session()->flash('alert', [
            'title' => 'Actividad Actualizada',
            'text' => 'La Actividad se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.actividades.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actividad $actividade)
    {
        $actividade->delete();

        session()->flash('alert', [
            'title' => 'Actividad Eliminada',
            'text' => 'La Actividad se ha Eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.actividades.index');
    }
}
