@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Planos de Aula</h2>

    <!-- Botão que abre o modal de cadastro -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalCriarPlano">
        Novo Plano
    </button>

    <div class="row">

        @if($planos->isEmpty())
            @php
                $planosFicticios = [
                    [
                        'titulo' => 'Plano Básico',
                        'itens' => [
                            ['titulo' => 'Conhecimento inicial do veículo', 'descricao' => 'Apresentação dos componentes do veículo, ajustes do banco, retrovisores e volante.'],
                            ['titulo' => 'Demonstração dos pedais', 'descricao' => 'Demonstração dos pedais e troca de marchas.'],
                            ['titulo' => 'Verificação básica', 'descricao' => 'Verificação de óleo, água, bateria, triângulo e calotas.'],
                        ],
                    ],
                    [
                        'titulo' => 'Plano Avançado',
                        'itens' => [
                            ['titulo' => 'Primeiros deslocamentos', 'descricao' => 'Primeiros deslocamentos em local seguro (rua calma).'],
                            ['titulo' => 'Prática de embreagem', 'descricao' => 'Treinamento focado em controle da embreagem e troca de marchas.'],
                            ['titulo' => 'Comportamento defensivo', 'descricao' => 'Simulação de situações reais com foco em segurança.'],
                        ],
                    ],
                ];
            @endphp

            @foreach($planosFicticios as $plano)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plano['titulo'] }}</h5>
                            <ul>
                                @foreach($plano['itens'] as $item)
                                    <li>
                                        <strong>{{ $item['titulo'] }}</strong><br>
                                        {{ $item['descricao'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        @else
            @foreach($planos as $plano)
                <div class="col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plano->titulo }}</h5>
                            <ul>
                                @foreach($plano->itens as $item)
                                    <li>
                                        <strong>{{ $item->titulo }}</strong><br>
                                        {{ $item->descricao }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

<!-- Modal de cadastro do plano -->
<div class="modal fade" id="modalCriarPlano" tabindex="-1" aria-labelledby="modalCriarPlanoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{-- {{ route('aulas.store') }} --}}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="modalCriarPlanoLabel">Cadastrar Novo Plano de Aula</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
          <div class="mb-3">
              <label for="titulo" class="form-label">Título do Plano</label>
              <input type="text" name="titulo" id="titulo" class="form-control" required>
          </div>

          <div id="itens-container">
              <h5>Itens do Plano</h5>
              <div class="item mb-3">
                  <input type="text" name="itens[0][titulo]" placeholder="Título do item" class="form-control mb-1" required>
                  <textarea name="itens[0][descricao]" placeholder="Descrição (opcional)" class="form-control" rows="2"></textarea>
              </div>
          </div>

          <button type="button" class="btn btn-secondary" onclick="addItem()">Adicionar Item</button>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Salvar Plano</button>
      </div>
    </form>
  </div>
</div>

<script>
    let contador = 1;
    function addItem() {
        const container = document.getElementById('itens-container');
        const div = document.createElement('div');
        div.classList.add('item', 'mb-3');
        div.innerHTML = `
            <input type="text" name="itens[\${contador}][titulo]" placeholder="Título do item" class="form-control mb-1" required>
            <textarea name="itens[\${contador}][descricao]" placeholder="Descrição (opcional)" class="form-control" rows="2"></textarea>
        `;
        container.appendChild(div);
        contador++;
    }
</script>
@endsection
