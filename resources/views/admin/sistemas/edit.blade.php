@extends('adminlte::page')

@section('title', 'Editar Sistema Operativo')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Editar Sistema Operativo</h5>
        </div>
        <div class="card-body">
            {!! Form::model($sistema, ['route'=> ['admin.sistemas.update', $sistema], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción') !!}
                    {!! Form::text('descripcion', null, ['class'=> 'form-control']) !!}

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