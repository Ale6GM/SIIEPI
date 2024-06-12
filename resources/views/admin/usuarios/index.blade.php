@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    
@stop

@section('content')
    <div class="card mt-2">
        <div class="card-header bg-dark">
            <h5>Usuarios del Sistema</h5>
        </div>
        @livewire('admin.UsuarioIndex')
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