@extends('adminlte::page')

@section('title', 'Editar Computadoras')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Editar Computadora</h5>
        </div>
        <div class="card-body">
            {!! Form::model($computadora, ['route'=> ['admin.computadoras.update', $computadora], 'method' => 'put']) !!}
                <div class="row">
                    <div class="form-group col-4">
                        {!! Form::label('ip', 'IP') !!}
                        {!! Form::text('ip', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la IP de la PC']) !!}
                    </div>
    
                    <div class="form-group col-4">
                        {!! Form::label('trabajo', 'Trabajo') !!}
                        {!! Form::text('trabajo', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la descripción del trabajo']) !!}
                        @error('trabajo')
                            {{$message}}
                        @enderror
                    </div>
    
                    <div class="form-group col-4">
                        {!! Form::label('procesador', 'Procesador') !!}
                        {!! Form::text('procesador', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte el tipo de Procesador']) !!}
                        @error('procesador')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-4">
                        {!! Form::label('velocidad', 'Velocidad') !!}
                        {!! Form::text('velocidad', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la velocidad del Procesador']) !!}
                        @error('velocidad')
                            {{$message}}
                        @enderror
                    </div>
    
                    <div class="form-group col-4">
                        {!! Form::label('almacenamiento', 'Almacenamiento') !!}
                        {!! Form::text('almacenamiento', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la capacidad en GB']) !!}
                        @error('almacenamiento')
                            {{$message}}
                        @enderror
                    </div>
    
                    <div class="form-group col-4">
                        {!! Form::label('memoria', 'Memoria RAM') !!}
                        {!! Form::text('memoria', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte cantidad de Memoria']) !!}
                        @error('memoria')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-4">
                        {!! Form::label('placa', 'Placa Madre') !!}
                        {!! Form::text('placa', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la marca de la Placa Madre']) !!}
                        @error('placa')
                            {{$message}}
                        @enderror
                    </div>
    
                    <div class="form-group col-4">
                        {!! Form::label('area_id', 'Area') !!}
                        {!! Form::select('area_id', $areas, null, ['class'=> 'form-control']) !!}
                    </div>
    
                    <div class="form-group col-4">
                        {!! Form::label('actividad_id', 'Actividades') !!}
                        {!! Form::select('actividad_id', $actividades, null, ['class'=> 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-4">
                        {!! Form::label(null, 'Sistema') !!}
                        <br>
                        @foreach ($sistemas as $sistema)
                            <label class="mr-3">                                
                                {!! Form::checkbox('sistemas[]', $sistema->id, null,) !!}
                                {{$sistema->descripcion}}
                            </label>
                            
                        @endforeach

                    </div>
                    <div class="form-group col-8">
                        {!! Form::label(null, 'Roturas') !!}
                        <br>
                        @foreach ($roturas as $rotura)
                            <label>
                                {!! Form::checkbox('roturas[]', $rotura->id, null) !!}
                                {{$rotura->descripcion}}
                            </label>
                        @endforeach
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