<table class="table table-striped mt-2">
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