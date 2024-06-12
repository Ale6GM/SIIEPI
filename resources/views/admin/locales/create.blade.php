@extends('adminlte::page')

@section('title', 'Pagina para Crear Local')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Nuevo Local</h4>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.locales.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte el Nombre del Local']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::text('descripcion', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la descripción del Local']) !!}
                </div>

                {!! Form::submit('Insertar', ['class'=> 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop