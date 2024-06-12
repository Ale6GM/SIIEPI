@extends('adminlte::page')

@section('title', 'Crear una Rotura')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Nueva Rotura</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.roturas.store']) !!}
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::text('descripcion', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la descripcion de la Rotura']) !!}

                    @error('descripcion')
                        <strong class="text-danger">
                            {{$message}}
                        </strong>
                    @enderror
                </div>

                {!! Form::submit('Insertar', ['class'=> 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop