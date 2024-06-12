@extends('adminlte::page')

@section('title', 'UPS')

@section('content_header')
    <h1>UPS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>UPS</h5>
        </div>
        <div class="card-body">
            @can('admin.ups.create')
            <a href="{{route('admin.ups.create')}}" class="btn btn-secondary"><i class="fas fa-plus"></i> Nuevo UPS</a>
            @endcan
            @can('exportar_ups')
            <a href="{{route('exportar_ups')}}" class="btn btn-success float-right"><i class="fas fa-file-export"></i>Exportar</a>
            @endcan
            @include('admin.ups.partials.upstable')
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