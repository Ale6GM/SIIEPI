@extends('adminlte::page')

@section('title', 'Computadoras')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Computadoras</h5>
        </div>
        <div class="card-body">
            @can('admin.computadoras.create')
            <a href="{{route('admin.computadoras.create')}}" class="btn btn-secondary mb-1"> <i class="fas fa-plus"></i>
                Nueva Computadora</a>
            @endcan
            @can('exportar_pc')
            <a href="{{route('exportar_pc')}}" class="btn btn-success float-right mb-1"> <i class="fas fa-file-export"></i>
                Exportar</a>
            @endcan
            {{-- @include('admin.computadoras.partials.pctables') --}}
            @livewire('Admin.PcIndex')
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