<div>
    <div class="row">
        <div class="col">
            <label>Areas</label>
            <select wire:model.live="selectedArea" class="form-control">
                <option value=""></option>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->descripcion}}</option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <label>Actividades</label>
            <select wire:model.live="selectedActividad" class="form-control">
                <option value=""></option>
                @foreach ($actividades as $actividad)
                    <option value="{{$actividad->id}}">{{$actividad->descripcion}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if ($data)
    <table class="table table-striped mt-2">
        <button wire:click="export" class="btn btn-success btn-sm mt-1"><i class="fas fa-file-export"></i> Exportar</button>
        <thead>
            <tr>
                <th>ID</th>
                <th>IP</th>
                <th>Trabajo</th>
                <th>Procesador</th>
                <th>Velocidad</th>
                <th>Almacenamiento(GB)</th>
                <th>Memoria</th>
                <th>Motherboard</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pc)
                <tr>
                    <td>{{$pc->id}}</td>
                    <td>{{$pc->ip}}</td>
                    <td>{{$pc->trabajo}}</td>
                    <td>{{$pc->procesador}}</td>
                    <td>{{$pc->velocidad}}</td>
                    <td>{{$pc->almacenamiento}}</td>
                    <td>{{$pc->memoria}}</td>
                    <td>{{$pc->placa}}</td>
                </tr>                        
            @endforeach
        </tbody>

    </table>
        
    @else
        <div class="card-body">
            
        </div>
    @endif
</div>
