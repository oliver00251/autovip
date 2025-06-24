<div class="table-responsive">
    <table id="instrutoresTable" class="table table-hover table-bordered table-striped align-middle" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Filial</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($instrutores as $instrutor)
                <tr data-id="{{ $instrutor->id }}">
                    <td>{{ $instrutor->nome }}</td>
                    <td>{{ $instrutor->cpf }}</td>
                    <td>{{ $instrutor->email }}</td>
                    <td>{{ $instrutor->codigo_filial }}</td>
                    <td>{{ $instrutor->tipo }}</td>
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
                        <button class="btn btn-sm btn-info btn-visualizar" title="Visualizar">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-primary btn-editar" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-excluir" title="Excluir">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditarInstrutor" tabindex="-1" aria-labelledby="modalEditarInstrutorLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditarInstrutor">
            @csrf
            @method('PUT')
            <input type="hidden" id="editarInstrutorId" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarInstrutorLabel">Editar Instrutor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="editarNome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="editarNome" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editarCpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="editarCpf" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editarEmail" class="form-label">E-mail</label>
                            <input type="email" name="email" id="editarEmail" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editarFilial" class="form-label">Filial</label>
                            <input type="text" name="codigo_filial" id="editarFilial" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editarTipo" class="form-label">Tipo</label>
                            <input type="text" name="tipo" id="editarTipo" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="editarPermissao" class="form-label">Permissão</label>
                            <select name="permissao" id="editarPermissao" class="form-select" required>
                                <option value="">Selecione</option>
                                @foreach ($permissao as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Excluir -->
<div class="modal fade" id="modalExcluirInstrutor" tabindex="-1" aria-labelledby="modalExcluirInstrutorLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form id="formExcluirInstrutor">
            @csrf
            @method('DELETE')
            <input type="hidden" id="excluirInstrutorId" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExcluirInstrutorLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir este instrutor?</p>
                </div>
                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Inicializa DataTable
    if ($('#instrutoresTable').length) {
    $('#instrutoresTable').DataTable({
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
}


        // Instancia os modais Bootstrap
        const modalEditar = new bootstrap.Modal(document.getElementById('modalEditarInstrutor'));
        const modalExcluir = new bootstrap.Modal(document.getElementById('modalExcluirInstrutor'));

        // Delegação de evento para abrir modal editar
        $('#instrutoresTable tbody').on('click', '.btn-editar', function() {
            const tr = $(this).closest('tr');
            const id = tr.data('id');
            const tds = tr.find('td');

            $('#editarInstrutorId').val(id);
            $('#editarNome').val(tds.eq(0).text().trim());
            $('#editarCpf').val(tds.eq(1).text().trim());
            $('#editarEmail').val(tds.eq(2).text().trim());
            $('#editarFilial').val(tds.eq(3).text().trim());
            $('#editarTipo').val(tds.eq(4).text().trim());
            $('#editarPermissao').val(tds.eq(4).text().trim()); // Ajuste conforme seu campo real

            modalEditar.show();
        });

        // Submissão do formulário de edição
        $('#formEditarInstrutor').on('submit', async function(e) {
            e.preventDefault();
            const id = $('#editarInstrutorId').val();
            const formData = new FormData(this);

            try {
                const response = await fetch(`/funcionarios/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                        'X-HTTP-Method-Override': 'PUT',
                    },
                    body: formData
                });

                if (response.ok) {
                    Swal.fire('Sucesso!', 'Instrutor atualizado com sucesso.', 'success').then(() =>
                        location.reload());
                } else {
                    Swal.fire('Erro', 'Não foi possível atualizar.', 'error');
                }
            } catch (err) {
                Swal.fire('Erro', 'Erro na requisição.', 'error');
            }
        });

        // Delegação para abrir modal excluir
        $('#instrutoresTable tbody').on('click', '.btn-excluir', function() {
            const tr = $(this).closest('tr');
            const id = tr.data('id');
            $('#excluirInstrutorId').val(id);
            modalExcluir.show();
        });

        // Submissão do formulário de exclusão
        $('#formExcluirInstrutor').on('submit', async function(e) {
            e.preventDefault();
            const id = $('#excluirInstrutorId').val();
            const formData = new FormData(this);

            try {
                const response = await fetch(`/funcionarios/${id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                        'X-HTTP-Method-Override': 'DELETE',
                    },
                    body: formData
                });

                if (response.ok) {
                    Swal.fire('Excluído!', 'Instrutor removido com sucesso.', 'success').then(() =>
                        location.reload());
                } else {
                    Swal.fire('Erro', 'Não foi possível excluir.', 'error');
                }
            } catch (err) {
                Swal.fire('Erro', 'Erro na requisição.', 'error');
            }
        });
    });
</script>

<style>
    /* Só pra deixar legal o espaçamento */
    div#instrutoresTable_filter {
        margin-bottom: 1rem;
    }

    .status-badge {
        padding: 0.3em 0.6em;
        border-radius: 0.25rem;
        color: #fff;
        font-size: 0.85em;
        font-weight: 600;
    }

    .status-ativo {
        background-color: #198754;
    }

    .status-inativo {
        background-color: #dc3545;
    }

    .status-pendente {
        background-color: #ffc107;
        color: #212529;
    }
</style>
