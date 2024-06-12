@extends('adminlte::page')

@section('title', 'Areas')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h4>Areas</h4>
        </div>
        <div class="card-body">
            @can('admin.areas.create')
            <a href="{{route('admin.areas.create')}}" class="btn btn-secondary"><i class="fas fa-plus"></i>
                Nueva Area</a>
            @endcan
            @can('exportar_area')
            <a href="{{route('exportar_area')}}" class="btn btn-success float-right"><i class="fas fa-file-export"></i>
                Exportar</a>
            @endcan
            @include('admin.areas.partials.areastables')
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
    

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