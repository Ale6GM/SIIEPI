<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpsRequest;
use App\Models\Ups;
use App\Exports\UpsExport;
use Maatwebsite\Excel\Facades\Excel;


class UpsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ups.index')->only('index');
        $this->middleware('can:admin.ups.create')->only('create', 'store');
        $this->middleware('can:admin.ups.edit')->only('edit','update');
        $this->middleware('can:admin.ups.destroy')->only('destroy');
        $this->middleware('can:exportar_ups')->only('exportUps');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upss = Ups::with('area')->get();
       return view('admin.ups.index', compact('upss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::pluck('descripcion','id');
        return view('admin.ups.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpsRequest $request)
    {
        $ups = Ups::create($request->all());

        session()->flash('alert', [
            'title' => 'UPS Creado',
            'text' => 'El UPS se ha creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.ups.index');
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
    public function edit(Ups $up)
    {
        $areas = Area::pluck('descripcion','id');
        return view('admin.ups.edit', compact('areas', 'up'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpsRequest $request, Ups $up)
    {
        $up->update($request->all());

        session()->flash('alert', [
            'title' => 'UPS Actualizado',
            'text' => 'El UPS se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.ups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ups $up)
    {
        $up->delete();

        session()->flash('alert', [
            'title' => 'UPS Eliminado',
            'text' => 'El UPS se ha Eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.ups.index');
    }

    public function exportUps() {
        return Excel::download(new UpsExport, 'ups.xlsx');
    }
}


