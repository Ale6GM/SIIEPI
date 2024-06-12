@extends('adminlte::page')

@section('title', 'Editar UPS')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Editar UPS</h5>
        </div>
        <div class="card-body">
            {!! Form::model($up,['route'=> ['admin.ups.update', $up], 'method'=>'put']) !!}
                <div class="row">
                    <div class="form-group col-6">
                        {!! Form::label('descripcion', 'Descripción') !!}
                        {!! Form::text('descripcion', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la Marca del UPS']) !!}
    
                        @error('descripcion')
                            {{$message}}
                        @enderror
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('area_id', 'Area') !!}
                        {!! Form::select('area_id', $areas, null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Guardar', ['class'=> 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop