<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AreaExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AreaStoreRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.areas.index')->only('index');
        $this->middleware('can:admin.areas.create')->only('create', 'store');
        $this->middleware('can:admin.areas.edit')->only('edit','update');
        $this->middleware('can:admin.areas.destroy')->only('destroy');
        $this->middleware('can:exportar_area')->only('exportArea');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AreaStoreRequest $request)
    {
        $areas = Area::create($request->all());

        session()->flash('alert', [
            'title' => 'Area Creada',
            'text' => 'El Area se ha creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.areas.index');
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
    public function edit(Area $area)
    {
        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        $area->update($request->all());

        session()->flash('alert', [
            'title' => 'Area Actualizada',
            'text' => 'El Area se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.areas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();

        session()->flash('alert', [
            'title' => 'Area Eliminada',
            'text' => 'El Area se ha Eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.areas.index');
    }

    public function exportArea() {
        return Excel::download(new AreaExport, 'Areas.xlsx');
    }

    public function getPcPorArea() {
        $areas = Area::withCount('computadoras')->get();

        $data = $areas->map(function($area) {
            return [
                'area' => $area->descripcion,
                'cantidad' => $area->computadoras_count,
            ];
        });

        return response()->json($data);
    }

    public function getUpsPorArea() {
        $areas = Area::withCount('ups')->get();

        $data = $areas->map(function($area) {
            return [
                'area' => $area->descripcion,
                'cantidad' => $area->ups_count,
            ];
        });

        return response()->json($data);
    }
}
