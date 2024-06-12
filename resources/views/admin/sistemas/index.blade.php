@extends('adminlte::page')

@section('title', 'Sistemas')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Sistemas Operativos</h5>
        </div>
        <div class="card-body">
            @can('admin.sistemas.create')
            <a href="{{route('admin.sistemas.create')}}" class="btn btn-secondary"> <i class="fas fa-plus"></i>
                Nuevo Sistema</a>
            @endcan
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($sistemas as $sistema)
                        <tr>
                            <td>{{$sistema->id}}</td>
                            <td>{{$sistema->descripcion}}</td>
                            @can('admin.sistemas.edit')
                            <td width = "10px">
                                <a href="{{route('admin.sistemas.edit', $sistema)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                </a>
                            </td>
                            @endcan
                            @can('admin.sistemas.destroy')
                            <td width = "10px">
                                <form action="{{route('admin.sistemas.destroy', $sistema)}}" method="post">
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
    @endif
</script>
@stop