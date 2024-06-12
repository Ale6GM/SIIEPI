<div>
    <div>
        <input wire:model.live="search" type="text" class="form-control mb-2" placeholder="Inserte la IP o el Trabajo">
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IP</th>
                    <th>Trabajo</th>
                    <th>Procesador</th>
                    <th>Velocidad</th>
                    <th>Almacenamiento</th>
                    <th>Memoria</th>
                    <th>Placa</th>
                    <th>Area</th>
                    <th>Actividad</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computadoras as $computadora)
                    <tr>
                        <td>{{$computadora->id}}</td>
                        <td>{{$computadora->ip}}</td>
                        <td>{{$computadora->trabajo}}</td>
                        <td>{{$computadora->procesador}}</td>
                        <td>{{$computadora->velocidad}}</td>
                        <td>{{$computadora->almacenamiento}}</td>
                        <td>{{$computadora->memoria}}</td>
                        <td>{{$computadora->placa}}</td>
                        <td>{{$computadora->area->descripcion}}</td>
                        <td>{{$computadora->actividad->descripcion}}</td>
                        @can('admin.computadoras.edit')
                        <td width = '10px'><a href="{{route('admin.computadoras.edit', $computadora)}}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i></a></td>
                        @endcan
                        @can('admin.computadoras.destroy')
                        <td width = '10px'>
                            <form action="{{route('admin.computadoras.destroy', $computadora)}}" method="post">
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
