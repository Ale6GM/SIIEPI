@extends('adminlte::page')

@section('title', 'Locales')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Locales</h4>
        </div>
        <div class="card-body">
            <a href="{{route('admin.locales.create')}}" class="btn btn-primary">Nuevo Local</a>
            <p>Aqui va la tabla con los Locales-----------------------------------------------------------------------------------------------------------------</p>
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop