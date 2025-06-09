<div class="table-responsive">
<table id="instrutoresTable" class="table table-hover table-bordered table-striped align-middle display" style="width:100%">
    <thead class="table-light">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Filial</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($instrutores as $instrutor)
            <tr>
                <td>{{ $instrutor->nome }}</td>
                <td>{{ $instrutor->cpf }}</td>
                <td>{{ $instrutor->email }}</td>
                <td>{{ $instrutor->codigo_filial }}</td>
                <td>
                    @if ($instrutor->status == 'Ativo')
                        <span class="status-badge status-ativo">Ativo</span>
                    @elseif($instrutor->status == 'Inativo')
                        <span class="status-badge status-inativo">Inativo</span>
                    @else
                        <span class="status-badge status-pendente">Pendente</span>
                    @endif
                </td>
                <td class="table-actions">
                    <button class="btn btn-sm btn-info" title="Visualizar">
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-primary" title="Editar">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Excluir">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
