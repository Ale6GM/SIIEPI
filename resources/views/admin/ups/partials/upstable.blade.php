            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Area</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($upss as $ups)
                        <tr>
                            <td>{{$ups->id}}</td>
                            <td>{{$ups->descripcion}}</td>
                            <td>{{$ups->area->descripcion}}</td>
                            @can('admin.ups.edit')
                            <td width = "10px">
                                <a href="{{route('admin.ups.edit', $ups)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                </a>
                            </td>
                            @endcan
                            @can('admin.ups.destroy')
                            <td width = "10px">
                                <form action="{{route('admin.ups.destroy', $ups)}}" method="post">
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