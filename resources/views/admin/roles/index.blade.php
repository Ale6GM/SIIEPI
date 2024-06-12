@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <h5>Roles</h5>
        </div>
        <div class="card-body">
            @can('admin.roles.create')
                <a href="{{route('admin.roles.create')}}" class="btn btn-secondary"> <i class="fas fa-plus"></i>Nuevo Rol</a>
            @endcan

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th colspan="2">Acciones</th>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            @can('admin.roles.edit')
                            <td width = "10px">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            @endcan
                            @can('admin.roles.destroy')
                            <td width = "10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="post">
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