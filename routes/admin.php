<?php

use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ComputadoraController;
use App\Http\Controllers\Admin\EstadisticaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoturaController;
use App\Http\Controllers\Admin\SistemaController;
use App\Http\Controllers\Admin\UpsController;
use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::resource('usuarios', UsuarioController::class)->names('admin.usuarios');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('areas', AreaController::class)->names('admin.areas');

Route::resource('computadoras', ComputadoraController::class)->names('admin.computadoras');

Route::resource('sistemas', SistemaController::class)->names('admin.sistemas');

Route::resource('roturas', RoturaController::class)->names('admin.roturas');

Route::resource('actividades', ActividadController::class)->names('admin.actividades')->parameters(['actividade'=>'actividad']);

Route::resource('ups', UpsController::class)->names('admin.ups')->parameters(['up' => 'ups']);

Route::get('estadisticas', [EstadisticaController::class, 'index'])->name('admin.estadisticas');
// Rutas para la creacion de reportes en formato excel
Route::get('exportar_ups', [UpsController::class, 'exportUps'])->name('exportar_ups');
Route::get('exportar_pc', [ComputadoraController::class, 'exportPc'])->name('exportar_pc');
Route::get('exportar_areas', [AreaController::class, 'exportArea'])->name('exportar_area');

// Ruta para los Graficos
Route::get('computadoras_areas', [AreaController::class, 'getPcPorArea'])->name('computadoras_areas');
Route::get('ups_areas', [AreaController::class, 'getUpsPorArea'])->name('ups_areas');