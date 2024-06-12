@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Asignar un Rol</h5>
        </div>
        <div class="card-body">
            <h5>Nombre:</h5>
            <p class="form-control">{{$usuario->name}}</p>

            <h2 class="h5">Listado de Roles</h2>
            {!! Form::model($usuario, ['route'=> ['admin.usuarios.update', $usuario], 'method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Asignar Rol', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}

           
        </div>
    </div>
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop