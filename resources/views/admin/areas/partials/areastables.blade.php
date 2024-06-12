<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>PC en Red</th>
            <th>PC con Intranet</th>
            <th>PC con Internet</th>
            <th>Usuarios Remotos</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($areas as $area)
            <tr>
                <td>{{$area->id}}</td>
                <td>{{$area->descripcion}}</td>
                <td>{{$area->pc_con_red}}</td>
                <td>{{$area->pc_con_intranet}}</td>
                <td>{{$area->pc_con_internet}}</td>
                <td>{{$area->usuarios_remotos}}</td>
                @can('admin.areas.edit')
                <td width = "10px">
                    <a href="{{route('admin.areas.edit', $area)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                </td>
                @endcan
                @can('admin.areas.destroy')
                <td width = "10px">
                    <form action="{{route('admin.areas.destroy', $area)}}" method="post">
                        @csrf
                        @method('delete')                        
                        <input id="btnSubmit" type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                    </form>
                </td>
                @endcan
            </tr>
            
        @endforeach
    </tbody>
</table>