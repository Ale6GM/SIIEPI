<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PcExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComputadorasStoreRequest;
use App\Http\Requests\ComputadorasUpdateRequest;
use App\Models\Actividad;
use App\Models\Area;
use App\Models\Computadora;
use App\Models\Rotura;
use App\Models\Sistema;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ComputadoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.computadoras.index')->only('index');
        $this->middleware('can:admin.computadoras.create')->only('create', 'store');
        $this->middleware('can:admin.computadoras.edit')->only('edit','update');
        $this->middleware('can:admin.computadoras.destroy')->only('destroy');
        $this->middleware('can:exportar_pc')->only('exportPc');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computadoras = Computadora::with(['area', 'actividad'])->get();

        return view('admin.computadoras.index', compact('computadoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sistemas = Sistema::all();
        $roturas = Rotura::all();
        $areas = Area::pluck('descripcion', 'id');
        $actividades = Actividad::pluck('descripcion', 'id');
        return view('admin.computadoras.create', compact('areas', 'actividades', 'sistemas', 'roturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComputadorasStoreRequest $request)
    {
        

        $computadora = Computadora::create($request->all());

        if($request->sistemas) {
            $computadora->sistemas()->attach($request->sistemas);
        }

        if($request->roturas) {
            $computadora->roturas()->attach($request->roturas);
        }

        session()->flash('alert', [
            'title' => 'Computadora Creada',
            'text' => 'La Computadora se ha creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.computadoras.index');
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
    public function edit(Computadora $computadora)
    {
        $areas = Area::pluck('descripcion', 'id');
        $actividades = Actividad::pluck('descripcion', 'id');
        return view('admin.computadoras.edit', compact('computadora', 'areas', 'actividades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComputadorasUpdateRequest $request, Computadora $computadora)
    {
        $computadora->update($request->all());

        session()->flash('alert', [
            'title' => 'Computadora Actualizada',
            'text' => 'La Computadora se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.computadoras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computadora $computadora)
    {
        $computadora->delete();

        session()->flash('alert', [
            'title' => 'Computadora Eliminada',
            'text' => 'La Computadora se ha eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.computadoras.index');
    }

    public function exportPc() {
        return Excel::download(new PcExport, 'computadoras.xlsx');
    }
}
