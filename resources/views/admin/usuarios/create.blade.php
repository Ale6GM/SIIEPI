@extends('adminlte::page')

@section('title', 'Crear Nuevo Usuario')

@section('content_header')
    
@stop

@section('content')
    <div class="card mt-2">
        <div class="card-header bg-dark">
            <h5>Crear Nuevo Usuario</h5>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>'admin.usuarios.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre']) !!}

                    @error('name')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Email']) !!}
                    @error('email')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Ingrese la contraseña']) !!}
                    @error('password')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('password_confimation', 'Confirme la Contraseña') !!}
                    {!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirme la contraseña']) !!}
                    @error('password')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Crear Usuario</button>
                
            {!! Form::close() !!}
        </div>
        
    </div>
@stop


@section('css')
   <link rel="stylesheet" href="{{asset('vendor\sweetalert2\dist\sweetalert2.css')}}">
@stop

@section('js')
<script src="{{asset('vendor\sweetalert2\dist\sweetalert2.js')}}"></script>

<script>
    @if(session('alert'))
        Swal.fire({
            title: '{{ session('alert.title') }}',
            text: '{{ session('alert.text') }}',
            icon: '{{ session('alert.icon') }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@stop