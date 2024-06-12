@extends('adminlte::page')

@section('title', 'Roturas')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Roturas</h5>
        </div>
        <div class="card-body">
            @can('admin.roturas.create')
                <a href="{{route('admin.roturas.create')}}" class="btn btn-secondary"><i class="fas fa-plus"></i> Nueva Rotura</a>
            @endcan

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($roturas as $rotura)
                        <tr>
                            <td>{{$rotura->id}}</td>
                            <td>{{$rotura->descripcion}}</td>
                            @can('admin.roturas.edit')
                            <td width = "10px">
                                <a href="{{route('admin.roturas.edit', $rotura)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            @endcan
                            @can('admin.roturas.destroy')
                            <td width = "10px">
                                <form action="{{route('admin.roturas.destroy', $rotura)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>

            </table>
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