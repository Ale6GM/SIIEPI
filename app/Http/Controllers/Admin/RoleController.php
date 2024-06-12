<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create', 'store');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function show(Role $role) {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        session()->flash('alert', [
            'title' => 'Rol Creado',
            'text' => 'El Rol se ha Creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        session()->flash('alert', [
            'title' => 'Rol Actualizado',
            'text' => 'El Rol se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('alert', [
            'title' => 'Rol Eliminado',
            'text' => 'El Rol se ha Eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.roles.index');
    }
}
