<div>
    <div class="row">
        <div class="col mb-2">
            <label for="">Areas</label>
            <select wire:model.live="selectedArea" class="form-control">
                <option value=""></option>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->descripcion}}</option>                    
                @endforeach

            </select>
        </div>
        <div class="col">
            <label for="">Elementos</label>
            <select wire:model.live="selectedItem" class="form-control">
                <option value=""></option>
                <option value="pc">Computadoras</option>
                <option value="ups">UPS</option>
            </select>
        </div>
    </div>
    
    <div>
        @if ($selectedItem === 'pc')
            <table class="table table-striped">
                <button wire:click="export" class="btn btn-success btn-sm mb-1"><i class="fas fa-file-export"></i>Exportar</button>
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
        @elseif($selectedItem === 'ups')
            <table class="table table-striped">
                <button wire:click="export" class="btn btn-success btn-sm mb-1">Exportar</button>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $ups)
                        <tr>
                            <td>{{$ups->id}}</td>
                            <td>{{$ups->descripcion}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>



