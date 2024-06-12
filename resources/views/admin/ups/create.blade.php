@extends('adminlte::page')

@section('title', 'Crear un UPS')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Nuevo UPS</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=> 'admin.ups.store']) !!}
                <div class="row">
                    <div class="form-group col-6">
                        {!! Form::label('descripcion', 'Descripción') !!}
                        {!! Form::text('descripcion', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la Marca del UPS']) !!}
    
                        @error('descripcion')
                            <strong class="text-danger">
                                {{$message}}
                            </strong>
                        @enderror
                    </div>
    
                    <div class="form-group col-6">
                        {!! Form::label('area_id', 'Area') !!}
                        {!! Form::select('area_id', $areas, null, ['class'=> 'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Insertar', ['class'=> 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop