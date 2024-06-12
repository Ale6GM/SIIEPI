@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Editar Rol</h5>
        </div>
        <div class="card-body">
            {!! Form::model($role, ['route'=>['admin.roles.update', $role], 'method'=>'put']) !!}
                @include('admin.roles.partials.form')

                {!! Form::submit('Editar Rol', ['class'=> 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop