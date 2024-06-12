@extends('adminlte::page')

@section('title', 'Pagina para Crear un Area')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Nueva Area</h5>
        </div>
        <div class="card-body">
                {!! Form::open(['route'=> 'admin.areas.store']) !!}
                <div class="row">    
                    <div class="col-12 form-group">
                        {!! Form::label('descripcion', 'Descripción') !!}
                        {!! Form::text('descripcion', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la descripción del Area']) !!}
                        @error('descripcion')
                            <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="col-6 form-group">
                        {!! Form::label('pc_con_red', 'Computadoras en Red') !!}
                        {!! Form::text('pc_con_red', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la cantidad de PC Conectadas a la Red']) !!}
                    </div>

                    <div class="col-6 form-group">
                        {!! Form::label('pc_con_intranet', 'Computadoras en Intranet') !!}
                        {!! Form::text('pc_con_intranet', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la cantidad de PC Conectadas a la Intranet']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        {!! Form::label('pc_con_internet', 'Computadoras en Internet') !!}
                        {!! Form::text('pc_con_internet', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la cantidad de PC Conectadas a Internet']) !!}
                    </div>
    
                    <div class="col-6 form-group">
                        {!! Form::label('usuarios_remotos', 'Usuarios Remotos') !!}
                        {!! Form::text('usuarios_remotos', null, ['class'=> 'form-control', 'placeholder'=> 'Inserte la cantidad de Usuarios Remotos']) !!}
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