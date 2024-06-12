@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1>Estadisticas del Sistema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Estadísticas por Area</h5>
        </div>
        <div class="card-body">
            <div>
                <livewire:Admin.Estadistica />
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark">
            <h5>Estadisticas de Computadoras</h5>
        </div>
        <div class="card-body">
            <livewire:Admin.EstadisticasComputadoras />
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark">
            <h5>Estadísticas de Roturas</h5>
        </div>
        <div class="card-body">
            <livewire:Admin.EstadisticasRoturas/>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-dark">
            <h5>Estadísticas por Actividades</h5>
        </div>
        <div class="card-body">
            <livewire:Admin.EstadisticaActividad />
        </div>
    </div>
@stop


@section('js')
    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
@stop