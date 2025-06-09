
<table id="instrutoresTable" class="table table-hover table-bordered table-striped align-middle display nowrap" style="width:100%">
    <thead class="table-light">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Filial</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instrutores as $instrutor)
            <tr>
                <td>{{ $instrutor->nome }}</td>
                <td>{{ $instrutor->cpf }}</td>
                <td>{{ $instrutor->email }}</td>
                <td>{{ $instrutor->codigo_filial }}</td>
                <td>{{ $instrutor->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>