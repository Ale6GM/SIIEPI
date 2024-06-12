<div>
    <div>
        @can('admin.usuarios.create')
            <a href="{{route('admin.usuarios.create')}}" class="btn btn-secondary mt-2 ml-2">Nuevo Usuario</a>
        @endcan
    </div>
    <div class="card-header">
        <input wire:model.live="search" type="text" class="form-control" placeholder="Ingrese un Nombre o un Email a Buscar">
    </div>    
    @if ($usuarios->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th colspan="2">Acciones</th>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        @can('admin.usuarios.edit')
                        <td width = "10px">
                            <a href="{{route('admin.usuarios.edit', $usuario)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </td>
                        @endcan
                        @can('admin.usuarios.destroy')
                        <td width = "10px">
                            <form action="{{route('admin.usuarios.destroy', $usuario)}}" method="post">
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
    <div class="card-footer">
        {{$usuarios->links()}}
    </div>
    @else
        <div class="card-body">
            <strong>No hay Registros</strong>
        </div>
    @endif
</div>
