<div class="container mt-4">
    <ul class="nav nav-tabs" id="cadastroTabs" role="tablist">
        @if ($exibir === 'alunos' || $exibir === null)
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab-alunos" data-bs-toggle="tab" data-bs-target="#alunos" type="button" role="tab">Alunos</button>
        </li>
        @endif

        @if ($exibir === 'funcionarios' || $exibir === null)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $exibir === 'funcionarios' ? 'active' : '' }}" id="tab-funcionarios" data-bs-toggle="tab" data-bs-target="#funcionarios" type="button" role="tab">funcionarios</button>
        </li>
        @endif
    </ul>

    <div class="tab-content pt-3" id="cadastroTabsContent">
        @if ($exibir === 'alunos' || $exibir === null)
        <div class="tab-pane fade {{ $exibir === 'alunos' || $exibir === null ? 'show active' : '' }}" id="alunos" role="tabpanel">
            @include('cadastro.table.alunos')
        </div>
        @endif

        @if ($exibir === 'funcionarios' || $exibir === null)
        <div class="tab-pane fade {{ $exibir === 'funcionarios' ? 'show active' : '' }}" id="funcionarios" role="tabpanel">
            @include('cadastro.table.instrutores')
        </div>
        @endif
    </div>
</div>
