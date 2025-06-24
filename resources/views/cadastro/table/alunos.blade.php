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
<script>
    $('#alunosTable').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 5,
            lengthMenu: [[5, 10, 25, -1], [5, 10, 25, "Todos"]],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
            },
            columnDefs: [
                { className: "text-center", targets: "_all" }
            ]
        });
</script>