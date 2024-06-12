<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


class EstadisticaController extends Controller
{
    public function index() {
        return view('admin.estadisticas.index');
    }
}
