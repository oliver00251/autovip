 <table id="instrutoresTable" class="table table-hover table-bordered table-striped align-middle display nowrap"
     style="width:100%">
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
<script>
        // Ano atual para o footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();
        
        // Toggle sidebar no mobile
        document.getElementById('sidebarToggler').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebarBackdrop').classList.toggle('show');
        });
        
        document.getElementById('sidebarBackdrop').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('show');
            document.getElementById('sidebarBackdrop').classList.remove('show');
        });
        
        // Inicializar DataTables
        $(document).ready(function() {
            $('#instrutoresTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
                },
                columnDefs: [
                    { orderable: false, targets: -1 } // Desabilita ordenação na coluna de ações
                ]
            });
            
            // Máscaras para inputs
            $('#cpf').inputmask('999.999.999-99');
            $('#telefone').inputmask('(99) 99999-9999');
        });
    </script>