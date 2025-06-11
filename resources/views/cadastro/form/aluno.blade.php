<!-- Modal -->
<div class="modal fade" id="modalCadastroAluno" tabindex="-1" aria-labelledby="modalCadastroAlunoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formAluno">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroAlunoLabel">Cadastro de Aluno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Tipo (fixo: Aluno) -->
                        <div class="col-md-6" hidden>
                            <label for="tipo" class="form-label">Tipo</label>
                            <input type="text" name="tipo" id="tipo" class="form-control" value="Aluno" readonly>
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

                        <!-- CPF (opcional) -->
                        <div class="col-md-6">
                            <label for="cpf" class="form-label">CPF (opcional)</label>
                            <input type="text" name="cpf" id="cpf" class="form-control">
                        </div>

                        <!-- Nome -->
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert2 + AJAX Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('formAluno').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    try {
        const response = await fetch("{{ route('alunos.store') }}", {
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
                title: 'Aluno cadastrado!',
                text: result.message || 'Cadastro realizado com sucesso.',
                showConfirmButton: false,
                timer: 1500
            });

            // Fecha o modal
            const modalEl = document.getElementById('modalCadastroAluno');
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