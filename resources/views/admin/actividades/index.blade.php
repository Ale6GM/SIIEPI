@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Actividades Universitarias</h5>
        </div>
        <div class="card-body">
            @can('admin.actividades.create')
            <a href="{{route('admin.actividades.create')}}" class="btn btn-secondary"><i class="fas fa-plus"></i>
                Nueva Actividad</a>
            @endcan

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Actividad</th>
                    <th colspan="2">Acciones</th>
                </thead>

                <tbody>
                    @foreach ($actividades as $actividad)
                        <tr>
                            <td>{{$actividad->id}}</td>
                            <td>{{$actividad->descripcion}}</td>
                            @can('admin.actividades.edit')
                            <td width = "10px">
                                <a href="{{route('admin.actividades.edit', $actividad)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            @endcan
                            @can('admin.actividades.destroy')
                            <td width = "10px">
                                <form action="{{route('admin.actividades.destroy', $actividad)}}" method="post">
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
</script>
@endif
@stop