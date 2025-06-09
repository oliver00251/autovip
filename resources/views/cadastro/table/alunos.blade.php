<table id="alunosTable" class="table table-hover table-bordered table-striped align-middle display nowrap" style="width:100%">
    <thead class="table-light">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Filial</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->cpf }}</td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->codigo_filial }}</td>
            </tr>
        @endforeach
    </tbody>
</table>