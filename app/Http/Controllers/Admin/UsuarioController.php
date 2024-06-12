<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.usuarios.index')->only('index');
        $this->middleware('can:admin.usuarios.edit')->only('edit','update');
        $this->middleware('can:admin.usuarios.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create() {
        return view('admin.usuarios.create');
    }

    public function store(StoreUserRequest $request) {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('alert', [
            'title' => 'Usuario Creado',
            'text' => 'El Usuario se ha creado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.usuarios.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);

        session()->flash('alert', [
            'title' => 'Usuario Actualizado',
            'text' => 'El Usuario se ha Actualizado Correctamente',
            'icon' => 'success'
        ]);

        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        session()->flash('alert', [
            'title' => 'Usuario Eliminado',
            'text' => 'El Usuario se ha eliminado Correctamente',
            'icon' => 'error'
        ]);

        return redirect()->route('admin.usuarios.index');
    }
}
