@extends('adminlte::page')

@section('title', 'Editar Actividad Universitaria')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Editar Actividad Universitaria</h4>
        </div>
        <div class="card-body">
            {!! Form::model($actividade, ['route'=> ['admin.actividades.update', $actividade], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::text('descripcion', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la actividad Universitaria']) !!}

                    @error('descripcion')
                        {{$message}}
                    @enderror
                </div>

                {!! Form::submit('Guardar', ['class'=> 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop