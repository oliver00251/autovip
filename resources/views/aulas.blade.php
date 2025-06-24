@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="container py-2">
    <h3 class="py-5">
        Plano de Aula
    </h3>
    {{-- <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome do Aluno</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Registro/CPF</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Instrutor Responsável</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Categoria</label>
                    <select class="form-select">
                        <option>Categoria A (Moto)</option>
                        <option selected>Categoria B (Carro)</option>
                        <option>Categoria C (Caminhão)</option>
                        <option>Categoria D (Ônibus)</option>
                        <option>Categoria E (Carreta)</option>
                    </select>
                </div>
            </div>
        </div>
    </div> --}}
<form action="{{-- {{ route('plano-aula.store') }} --}}" method="POST">
    @csrf

    @php
        $aulas = [
            1 => [
                'titulo' => '1ª Aula',
                'descricao' => [
                    'Conhecimento inicial do veículo / Regras Básicas / Postura.',
                    'Apresentação dos componentes do veículo',
                    'Ajustes do banco, retrovisores e volante',
                    'Demonstração dos pedais e troca de marchas',
                    'Verificação de óleo, água, bateria, triângulo e calotas',
                ],
            ],
            2 => [
                'titulo' => '2ª Aula',
                'descricao' => [
                    'Conhecimento inicial do veículo / Regras Básicas / Postura.',
                    'Apresentação dos componentes do veículo',
                    'Ajustes do banco, retrovisores e volante',
                    'Demonstração dos pedais e troca de marchas',
                    'Verificação de óleo, água, bateria, triângulo e calotas',
                ],
            ],
            3 => [
                'titulo' => '3ª Aula',
                'descricao' => [
                    'Primeiros deslocamentos em local seguro (rua calma).',
                    'Prática de embreagem',
                    'Comportamento defensivo',
                    'Simulação de troca de pneu',
                ],
            ],
            4 => [
                'titulo' => '4ª Aula',
                'descricao' => [
                    'Primeiros deslocamentos em local seguro (rua calma).',
                    'Prática de embreagem',
                    'Comportamento defensivo',
                    'Simulação de troca de pneu',
                ],
            ],
        ];
    @endphp

    @foreach ($aulas as $num => $aula)
        <div class="mb-4 p-3 border rounded">
            <h4>{{ $aula['titulo'] }}</h4>
            <ul>
                @foreach ($aula['descricao'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>

            <div class="mb-3">
                <label class="form-label">Atingiu objetivo?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="aulas[{{ $num }}][atingiu_objetivo]" id="atingiu_sim_{{ $num }}" value="sim" required>
                    <label class="form-check-label" for="atingiu_sim_{{ $num }}">Sim</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="aulas[{{ $num }}][atingiu_objetivo]" id="atingiu_nao_{{ $num }}" value="nao" required>
                    <label class="form-check-label" for="atingiu_nao_{{ $num }}">Não</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="assinatura_aluno_{{ $num }}" class="form-label">Assinatura do Aluno:</label>
                <input type="text" class="form-control" id="assinatura_aluno_{{ $num }}" name="aulas[{{ $num }}][assinatura_aluno]" required>
            </div>

            <div class="mb-3">
                <label for="assinatura_instrutor_{{ $num }}" class="form-label">Assinatura do Instrutor:</label>
                <input type="text" class="form-control" id="assinatura_instrutor_{{ $num }}" name="aulas[{{ $num }}][assinatura_instrutor]" required>
            </div>
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Salvar Plano de Aula</button>
</form>

    <div class="row g-4">
        <!-- 1ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-primary">1ª Aula</h2>
                        <span class="badge badge-basic">Básico</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Conhecimento inicial do veículo / Regras Básicas / Postura</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Apresentação dos componentes do veículo</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Ajustes do banco, retrovisores e volante</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Demonstração dos pedais e troca de marchas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Verificação de óleo, água, bateria, triângulo e calotas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-1">
                                <label class="form-check-label" for="sim-1">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-1">
                                <label class="form-check-label" for="nao-1">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-primary">2ª Aula</h2>
                        <span class="badge badge-basic">Básico</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Conhecimento inicial do veículo / Regras Básicas / Postura</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Apresentação dos componentes do veículo</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Ajustes do banco, retrovisores e volante</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Demonstração dos pedais e troca de marchas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-primary me-2 list-icon"></i>
                            <span>Verificação de óleo, água, bateria, triângulo e calotas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-2">
                                <label class="form-check-label" for="sim-2">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-2">
                                <label class="form-check-label" for="nao-2">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-success">3ª Aula</h2>
                        <span class="badge badge-inicial">Prática Inicial</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Primeiros deslocamentos em local seguro (rua calma)</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2 list-icon"></i>
                            <span>Prática de embreagem</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2 list-icon"></i>
                            <span>Comportamento defensivo</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2 list-icon"></i>
                            <span>Simulação de troca de pneu</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-3">
                                <label class="form-check-label" for="sim-3">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-3">
                                <label class="form-check-label" for="nao-3">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-success">4ª Aula</h2>
                        <span class="badge badge-inicial">Prática Inicial</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Primeiros deslocamentos em local seguro (rua calma)</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2 list-icon"></i>
                            <span>Prática de embreagem</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2 list-icon"></i>
                            <span>Comportamento defensivo</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-success me-2 list-icon"></i>
                            <span>Simulação de troca de pneu</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-4">
                                <label class="form-check-label" for="sim-4">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-4">
                                <label class="form-check-label" for="nao-4">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-warning">5ª Aula</h2>
                        <span class="badge badge-controlada">Prática Controlada</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática controlada em baixa velocidade</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Subidas, descidas e controle de embreagem</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Paradas obrigatórias simuladas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Cuidados com lombadas e buracos</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Simulação de pane ou problema</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-5">
                                <label class="form-check-label" for="sim-5">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-5">
                                <label class="form-check-label" for="nao-5">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-warning">6ª Aula</h2>
                        <span class="badge badge-controlada">Prática Controlada</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática controlada em baixa velocidade</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Subidas, descidas e controle de embreagem</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Paradas obrigatórias simuladas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Cuidados com lombadas e buracos</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Simulação de pane ou problema</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-6">
                                <label class="form-check-label" for="sim-6">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-6">
                                <label class="form-check-label" for="nao-6">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-warning">7ª Aula</h2>
                        <span class="badge badge-controlada">Prática Controlada</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática controlada em baixa velocidade</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Subidas, descidas e controle de embreagem</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Paradas obrigatórias simuladas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Cuidados com lombadas e buracos</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Simulação de pane ou problema</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-7">
                                <label class="form-check-label" for="sim-7">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-7">
                                <label class="form-check-label" for="nao-7">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 8ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-warning">8ª Aula</h2>
                        <span class="badge badge-controlada">Prática Controlada</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática controlada em baixa velocidade</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Subidas, descidas e controle de embreagem</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Paradas obrigatórias simuladas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Cuidados com lombadas e buracos</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-warning me-2 list-icon"></i>
                            <span>Simulação de pane ou problema</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-8">
                                <label class="form-check-label" for="sim-8">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-8">
                                <label class="form-check-label" for="nao-8">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 9ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold" style="color: #5a287d;">9ª Aula</h2>
                        <span class="badge badge-manobras">Manobras</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática de manobras</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Técnicas de baliza</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Uso correto dos retrovisores</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Simulação de pane ou problema</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-9">
                                <label class="form-check-label" for="sim-9">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-9">
                                <label class="form-check-label" for="nao-9">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 10ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold" style="color: #5a287d;">10ª Aula</h2>
                        <span class="badge badge-manobras">Manobras</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática de manobras</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Técnicas de baliza</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Uso correto dos retrovisores</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Simulação de pane ou problema</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-10">
                                <label class="form-check-label" for="sim-10">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-10">
                                <label class="form-check-label" for="nao-10">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 11ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold" style="color: #5a287d;">11ª Aula</h2>
                        <span class="badge badge-manobras">Manobras</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática de manobras</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Técnicas de baliza</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Uso correto dos retrovisores</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Uso correto das setas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-11">
                                <label class="form-check-label" for="sim-11">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-11">
                                <label class="form-check-label" for="nao-11">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 12ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold" style="color: #5a287d;">12ª Aula</h2>
                        <span class="badge badge-manobras">Manobras</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática de manobras</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Técnicas de baliza</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Uso correto dos retrovisores</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #5a287d;"></i>
                            <span>Simulação das setas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-12">
                                <label class="form-check-label" for="sim-12">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-12">
                                <label class="form-check-label" for="nao-12">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 13ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-danger">13ª Aula</h2>
                        <span class="badge badge-transito">Trânsito Real</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática em trânsito real</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Trânsito urbano moderado</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Conversões corretas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Respeito à sinalização</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Prática de rampas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-13">
                                <label class="form-check-label" for="sim-13">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-13">
                                <label class="form-check-label" for="nao-13">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 14ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-danger">14ª Aula</h2>
                        <span class="badge badge-transito">Trânsito Real</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática em trânsito real</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Trânsito urbano moderado</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Conversões corretas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Respeito à sinalização</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Prática de rampas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-14">
                                <label class="form-check-label" for="sim-14">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-14">
                                <label class="form-check-label" for="nao-14">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 15ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-danger">15ª Aula</h2>
                        <span class="badge badge-transito">Trânsito Real</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática em trânsito real</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Trânsito urbano moderado</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Conversões corretas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Respeito à sinalização</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Prática de rampas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-15">
                                <label class="form-check-label" for="sim-15">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-15">
                                <label class="form-check-label" for="nao-15">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 16ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-danger">16ª Aula</h2>
                        <span class="badge badge-transito">Trânsito Real</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Prática em trânsito real</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Trânsito urbano moderado</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Conversões corretas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Respeito à sinalização</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-danger me-2 list-icon"></i>
                            <span>Prática de rampas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-16">
                                <label class="form-check-label" for="sim-16">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-16">
                                <label class="form-check-label" for="nao-16">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 17ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-secondary">17ª Aula</h2>
                        <span class="badge badge-revisao">Revisão</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Revisão e correção de erros</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Retomar dificuldades</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Revisar manobras</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Relembrar situações simuladas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-17">
                                <label class="form-check-label" for="sim-17">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-17">
                                <label class="form-check-label" for="nao-17">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 18ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-secondary">18ª Aula</h2>
                        <span class="badge badge-revisao">Revisão</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Revisão e correção de erros</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Retomar dificuldades</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Revisar manobras</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Relembrar situações simuladas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-18">
                                <label class="form-check-label" for="sim-18">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-18">
                                <label class="form-check-label" for="nao-18">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 19ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold text-secondary">19ª Aula</h2>
                        <span class="badge badge-revisao">Revisão</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Revisão e correção de erros</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Retomar dificuldades</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Revisar manobras</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill text-secondary me-2 list-icon"></i>
                            <span>Relembrar situações simuladas</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-19">
                                <label class="form-check-label" for="sim-19">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-19">
                                <label class="form-check-label" for="nao-19">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 20ª Aula -->
        <div class="col-md-6">
            <div class="card aula-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <h2 class="h5 fw-bold" style="color: #055160;">20ª Aula</h2>
                        <span class="badge badge-exame">Exame</span>
                    </div>
                    <h3 class="h6 fw-bold mt-2">Simulação de exame prático oficial</h3>
                    <ul class="list-unstyled mt-3">
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #055160;"></i>
                            <span>Usar boleto de avaliação</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #055160;"></i>
                            <span>Não dar dicas</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #055160;"></i>
                            <span>Avaliar postura e controle</span>
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="bi bi-check-circle-fill me-2 list-icon" style="color: #055160;"></i>
                            <span>Preencher boleto ao final</span>
                        </li>
                    </ul>
                    <div class="mt-3 pt-3 border-top">
                        <div class="d-flex align-items-center">
                            <span class="me-3">Atingiu objetivo?</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sim-20">
                                <label class="form-check-label" for="sim-20">Sim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nao-20">
                                <label class="form-check-label" for="nao-20">Não</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label class="form-label">Assinatura do Aluno:</label>
                                <div class="signature-line"></div>
                            </div>
                            <div>
                                <label class="form-label">Assinatura do Instrutor:</label>
                                <div class="signature-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Função para garantir que apenas um checkbox (Sim ou Não) esteja marcado por vez
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const id = this.id;
            const isYes = id.startsWith('sim-');
            const aula = id.split('-')[1];
            
            if (isYes) {
                document.getElementById(`nao-${aula}`).checked = false;
            } else {
                document.getElementById(`sim-${aula}`).checked = false;
            }
        });
    });
</script>
@endsection