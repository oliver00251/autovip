@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="container py-5">
        <h3>Gerenciamento de Frota</h3>
        <!-- Filters Card -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-funnel"></i> Filtros
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="filtroMarca" class="form-label">Marca</label>
                        <select class="form-select" id="filtroMarca">
                            <option value="">Todas</option>
                            <option value="Volkswagen">Volkswagen</option>
                            <option value="Fiat">Fiat</option>
                            <option value="Chevrolet">Chevrolet</option>
                            <option value="Ford">Ford</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Honda">Honda</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filtroAno" class="form-label">Ano</label>
                        <select class="form-select" id="filtroAno">
                            <option value="">Todos</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filtroCor" class="form-label">Cor</label>
                        <select class="form-select" id="filtroCor">
                            <option value="">Todas</option>
                            <option value="Branco">Branco</option>
                            <option value="Preto">Preto</option>
                            <option value="Prata">Prata</option>
                            <option value="Vermelho">Vermelho</option>
                            <option value="Azul">Azul</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="filtroStatus" class="form-label">Status</label>
                        <select class="form-select" id="filtroStatus">
                            <option value="">Todos</option>
                            <option value="Disponível">Disponível</option>
                            <option value="Em manutenção">Em manutenção</option>
                            <option value="Em uso">Em uso</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-secondary me-2" id="limparFiltros">Limpar</button>
                    <button class="btn btn-primary" id="aplicarFiltros">Aplicar Filtros</button>
                </div>
            </div>
        </div>

        <!-- Vehicles Table -->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-12 text-md-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                            <i class="bi bi-plus-circle"></i> Novo Veículo
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table id="tabelaVeiculos" class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Ano</th>
                                <th>Cor</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($veiculos as $veiculo)
                                <tr>
                                    <td>{{ $veiculo->placa }}</td>
                                    <td>{{ $veiculo->marca }}</td>
                                    <td>{{ $veiculo->modelo }}</td>
                                    <td>{{ $veiculo->ano }}</td>
                                    <td>{{ $veiculo->cor }}</td>
                                    <td>
                                        @php
                                            $statusClass = 'badge bg-secondary';
                                            if ($veiculo->status == 'Disponível') {
                                                $statusClass = 'badge bg-success';
                                            } elseif ($veiculo->status == 'Em manutenção') {
                                                $statusClass = 'badge bg-warning text-dark';
                                            } elseif ($veiculo->status == 'Em uso') {
                                                $statusClass = 'badge bg-info text-dark';
                                            }
                                        @endphp
                                        <span class="{{ $statusClass }}">{{ $veiculo->status }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary btn-editar" data-id="{{ $veiculo->id }}"
                                            data-bs-toggle="modal" data-bs-target="#cadastroModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form method="POST" action="{{ route('veiculos.destroy', $veiculo->id) }}"
                                            class="d-inline" onsubmit="return confirm('Confirma exclusão?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>


    </div>

    <!-- Modal de Cadastro/Edição -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Novo Veículo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formVeiculo" action="{{ route('veiculos.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idVeiculo" value="">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="placa" class="form-label">Placa*</label>
                                <input type="text" class="form-control" name="placa" required maxlength="8"
                                    placeholder="ABC1234" value="ABC1234">
                            </div>
                            <div class="col-md-6">
                                <label for="renavam" class="form-label">Renavam*</label>
                                <input type="text" class="form-control" name="renavam" required maxlength="11"
                                    placeholder="12345678901" value="12345678901">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="marca" class="form-label">Marca*</label>
                                <select class="form-select" name="marca" required>
                                    <option value="">Selecione</option>
                                    <option value="Volkswagen" selected>Volkswagen</option>
                                    <option value="Fiat">Fiat</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Renault">Renault</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="modelo" class="form-label">Modelo*</label>
                                <input type="text" class="form-control" name="modelo" required placeholder="Ex: Gol"
                                    value="Gol">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="ano" class="form-label">Ano*</label>
                                <input type="number" class="form-control" name="ano" required min="1900"
                                    max="2099" placeholder="2023" value="2023">
                            </div>
                            <div class="col-md-4">
                                <label for="cor" class="form-label">Cor*</label>
                                <input type="text" class="form-control" name="cor" required
                                    placeholder="Ex: Branco" value="Branco">
                            </div>
                            <div class="col-md-4">
                                <label for="status" class="form-label">Status*</label>
                                <select class="form-select" name="status" required>
                                    <option value="">Selecione</option>
                                    <option value="Disponível" selected>Disponível</option>
                                    <option value="Em manutenção">Em manutenção</option>
                                    <option value="Em uso">Em uso</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="chassi" class="form-label">Chassi*</label>
                                <input type="text" class="form-control" name="chassi" required maxlength="17"
                                    placeholder="9BWZZZ377VT004251" value="9BWZZZ377VT004251">
                            </div>
                            <div class="col-md-6">
                                <label for="combustivel" class="form-label">Combustível*</label>
                                <select class="form-select" name="combustivel" required>
                                    <option value="">Selecione</option>
                                    <option value="Gasolina" selected>Gasolina</option>
                                    <option value="Etanol">Etanol</option>
                                    <option value="Flex">Flex</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="GNV">GNV</option>
                                    <option value="Elétrico">Elétrico</option>
                                    <option value="Híbrido">Híbrido</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control" name="observacoes" rows="3"
                                placeholder="Informações adicionais sobre o veículo">Veículo para testes</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="salvarVeiculo">Salvar</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="salvarVeiculo">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    <div class="modal fade" id="confirmacaoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o veículo <strong id="placaExclusao"></strong>?</p>
                    <p class="text-danger"><i class="bi bi-exclamation-triangle"></i> Esta ação não poderá ser desfeita.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmarExclusao">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Visualização -->
    <div class="modal fade" id="visualizacaoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Detalhes do Veículo</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6>Placa</h6>
                            <p id="viewPlaca" class="border-bottom pb-2"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Renavam</h6>
                            <p id="viewRenavam" class="border-bottom pb-2"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6>Marca</h6>
                            <p id="viewMarca" class="border-bottom pb-2"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Modelo</h6>
                            <p id="viewModelo" class="border-bottom pb-2"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h6>Ano</h6>
                            <p id="viewAno" class="border-bottom pb-2"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>Cor</h6>
                            <p id="viewCor" class="border-bottom pb-2"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h6>Status</h6>
                            <p id="viewStatus" class="border-bottom pb-2"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6>Chassi</h6>
                            <p id="viewChassi" class="border-bottom pb-2"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Combustível</h6>
                            <p id="viewCombustivel" class="border-bottom pb-2"></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6>Observações</h6>
                        <p id="viewObservacoes" class="border-bottom pb-2"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="editarDoVisualizar">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- SweetAlert2 + AJAX Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .btn-primary {
            background-color: #4a6fdc;
            border-color: #4a6fdc;
        }

        .btn-primary:hover {
            background-color: #3d5cba;
            border-color: #3d5cba;
        }

        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .action-buttons .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .custom-sidebar .nav-link.active {
            background-color: #DD0922 !important;
            color: #fff !important;
        }
    </style>
    <script>
        document.getElementById('formVeiculo').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch("{{ route('veiculos.store') }}", {
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
                        title: 'Veículo cadastrado!',
                        text: result.message || 'Cadastro realizado com sucesso.',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Fecha o modal
                    const modalEl = document.getElementById('cadastroModal');
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

        // Dados de exemplo para a tabela
        let veiculos = [{
                id: 1,
                placa: "ABC1234",
                renavam: "12345678901",
                marca: "Volkswagen",
                modelo: "Gol",
                ano: 2020,
                cor: "Branco",
                status: "Disponível",
                chassi: "9BWZZZ377VT004251",
                combustivel: "Flex",
                observacoes: "Veículo em ótimo estado"
            },
            {
                id: 2,
                placa: "DEF5678",
                renavam: "23456789012",
                marca: "Fiat",
                modelo: "Uno",
                ano: 2019,
                cor: "Vermelho",
                status: "Em manutenção",
                chassi: "8AWPB05Z0CA900001",
                combustivel: "Gasolina",
                observacoes: "Necessita troca de óleo"
            },
            {
                id: 3,
                placa: "GHI9012",
                renavam: "34567890123",
                marca: "Chevrolet",
                modelo: "Onix",
                ano: 2021,
                cor: "Prata",
                status: "Em uso",
                chassi: "9BGKS48L0FG100001",
                combustivel: "Flex",
                observacoes: ""
            },
            {
                id: 4,
                placa: "JKL3456",
                renavam: "45678901234",
                marca: "Toyota",
                modelo: "Corolla",
                ano: 2022,
                cor: "Preto",
                status: "Disponível",
                chassi: "9BRBD48E0K2100001",
                combustivel: "Flex",
                observacoes: "Veículo novo"
            },
            {
                id: 5,
                placa: "MNO7890",
                renavam: "56789012345",
                marca: "Honda",
                modelo: "Civic",
                ano: 2020,
                cor: "Azul",
                status: "Em uso",
                chassi: "93HFC2640KZ100001",
                combustivel: "Gasolina",
                observacoes: "Revisão agendada para o próximo mês"
            }
        ];
    </script>
@endsection
