@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Crear Rol</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                    @include('admin.roles.partials.form')
                {!! Form::submit('Crear Rol', ['class'=> 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop