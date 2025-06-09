<div class="container mt-4">
    <ul class="nav nav-tabs" id="cadastroTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab-alunos" data-bs-toggle="tab" data-bs-target="#alunos" type="button" role="tab">Alunos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab-instrutores" data-bs-toggle="tab" data-bs-target="#instrutores" type="button" role="tab">Instrutores</button>
        </li>
    </ul>

    <div class="tab-content pt-3" id="cadastroTabsContent">
        <!-- Tabela de Alunos -->
        <div class="tab-pane fade show active" id="alunos" role="tabpanel">
            @include('cadastro.table.alunos')
        </div>
        <!-- Tabela de Instrutores -->
        <div class="tab-pane fade" id="instrutores" role="tabpanel">
            @include('cadastro.table.instrutores')
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
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
    });
</script>
