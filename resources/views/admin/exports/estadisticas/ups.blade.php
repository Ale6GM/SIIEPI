<table class="table table-striped">
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