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
            <label>Sistemas</label>
            <select wire:model.live="selectedSistema" class="form-control">
                <option value=""></option>
                @foreach ($sistemas as $sistema)
                    <option value="{{$sistema->id}}">{{$sistema->descripcion}}</option>
                @endforeach
            </select>
        </div>
   </div>
   <div class="row">
        @if (count($data))
        <table class="table table-striped">
            <button wire:click="export" class="btn btn-success btn-sm mt-1"> <i class="fas fa-file-export"></i>Exportar</button>
            <table class="table table-striped">
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
    
        </table>
        @else
            <div class="card-body">
            </div>
        @endif
   </div>
</div>