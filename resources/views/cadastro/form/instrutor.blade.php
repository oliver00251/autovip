<!-- Modal -->
<div class="modal fade" id="modalCadastroFuncionario" tabindex="-1" aria-labelledby="modalCadastroFuncionarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formFuncionario">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroFuncionarioLabel">Cadastro de Funcionário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Tipo -->
                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select name="tipo" id="tipo" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="Instrutor">Instrutor</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Recepção">Recepção</option>
                            </select>
                        </div>

                        <!-- Permissão -->
                        <div class="col-md-6">
                            <label for="permissao" class="form-label">Permissão</label>
                            <select name="permissao" id="permissao" class="form-select" required>
                                <option value="">Selecione</option>
                                @foreach ($permissao as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Código Filial -->
                        <div class="col-md-6">
                            <label for="codigo_filial" class="form-label">Filial</label>
                            <select name="codigo_filial" id="codigo_filial" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="140">São Mateus - 140</option>
                                <option value="1140">Barro Branco - 1140</option>
                            </select>
                        </div>

                        <!-- Nome -->
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>

                        <!-- CPF -->
                        <div class="col-md-6">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <!-- Status (oculto) -->
                        <div class="col-md-6" hidden>
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="Ativo" selected>Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 + AJAX Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('formFuncionario').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch("{{ route('funcionarios.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData,
        });

        if (response.ok) {
            const result = await response.json();

            Swal.fire({
                icon: 'success',
                title: 'Funcionário cadastrado!',
                text: result.message || 'Cadastro realizado com sucesso.',
                showConfirmButton: false,
                timer: 1500
            });

            // Fecha o modal
            const modalEl = document.getElementById('modalCadastroFuncionario');
            const modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();

            // Reseta o form
            form.reset();

            // Aguarda o fechamento da modal antes de recarregar
            setTimeout(() => {
                window.location.reload();
            }, 500);
        } else if (response.status === 422) {
            const result = await response.json();
            const errors = Object.values(result.errors).flat().join('\n');

            Swal.fire({
                icon: 'error',
                title: 'Erro de validação',
                text: errors
            });
        } else {
            const result = await response.json();
            Swal.fire({
                icon: 'error',
                title: 'Erro ao salvar',
                text: result.message || 'Erro inesperado.'
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Falha de conexão',
            text: error.message || 'Erro de rede ou servidor.'
        });
    }
});

</script>
