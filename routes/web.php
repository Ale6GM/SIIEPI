<?php

use App\Models\Area;
use App\Models\Computadora;
use App\Models\Ups;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $cantidadComputadoras = Computadora::count();
        $cantidadAreas = Area::count();
        $cantidadUps = Ups::count();
        $cantidadUsuarios = User::count();
        return view('dashboard', compact('cantidadComputadoras', 'cantidadAreas', 'cantidadUps', 'cantidadUsuarios'));
    })->name('dashboard');
});
