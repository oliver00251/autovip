
    <style>
        :root {
            --primary: #2C2C74;
            --secondary: #DD0922;
            --white: #FFFFFF;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }
        
        .sidebar {
            min-height: 100vh;
            background-color: var(--primary);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
            border-radius: 5px;
            padding: 10px 15px;
        }
        
        .sidebar .nav-link:hover {
            color: var(--white);
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar .nav-link.active {
            color: var(--white);
            background-color: var(--secondary);
        }
        
        .logo-container {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .logo-text {
            color: var(--white);
            font-weight: bold;
            font-size: 1.5rem;
            margin: 0;
        }
        
        .content-header {
            background-color: var(--white);
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .page-title {
            color: var(--primary);
            font-weight: 600;
            margin: 0;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover, .btn-primary:focus {
            background-color: #232360;
            border-color: #232360;
        }
        
        .btn-secondary {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }
        
        .btn-secondary:hover, .btn-secondary:focus {
            background-color: #c40820;
            border-color: #c40820;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .card-header {
            background-color: var(--white);
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            font-weight: 600;
            color: var(--primary);
        }
        
        .table th {
            background-color: var(--light-gray);
            color: var(--primary);
            font-weight: 600;
        }
        
        .badge-status-active {
            background-color: #28a745;
        }
        
        .badge-status-inactive {
            background-color: var(--secondary);
        }
        
        .btn-circle {
            width: 32px;
            height: 32px;
            padding: 0;
            border-radius: 50%;
            text-align: center;
            line-height: 32px;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark-gray);
        }
        
        .required::after {
            content: " *";
            color: var(--secondary);
        }
        
        .modal-header {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .dashboard-card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .dashboard-icon {
            font-size: 2.5rem;
            color: var(--primary);
        }
        
        .dashboard-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
        }
        
        .dashboard-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .nav-tabs .nav-link {
            color: var(--dark-gray);
            border: none;
            padding: 10px 20px;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary);
            border-bottom: 3px solid var(--primary);
            font-weight: 600;
        }
    </style>


    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="logo-container d-flex align-items-center">
                    <h5 class="logo-text">Auto Escola VIP</h5>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people me-2"></i>
                                Alunos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-badge me-2"></i>
                                Instrutores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-calendar-check me-2"></i>
                                Aulas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-car-front me-2"></i>
                                Veículos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-cash-coin me-2"></i>
                                Financeiro
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-earmark-text me-2"></i>
                                Relatórios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear me-2"></i>
                                Configurações
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Máscara para CPF
        document.getElementById('cpf').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 9) {
                value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{3})(\d{3})(\d{0,3}).*/, '$1.$2.$3');
            } else if (value.length > 3) {
                value = value.replace(/^(\d{3})(\d{0,3}).*/, '$1.$2');
            }
            
            e.target.value = value;
        });

        // Máscara para telefone
        document.getElementById('telefone').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 10) {
                value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d{0,5}).*/, '($1) $2');
            }
            
            e.target.value = value;
        });

        // Validação do formulário
        document.getElementById('formInstrutor').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const form = event.target;
            if (!form.checkValidity()) {
                event.stopPropagation();
                form.classList.add('was-validated');
                return;
            }
            
            // Verificar se pelo menos uma categoria foi selecionada
            const categorias = document.querySelectorAll('input[name="categorias[]"]:checked');
            if (categorias.length === 0) {
                alert('Por favor, selecione pelo menos uma categoria habilitada.');
                return;
            }
            
            // Simulação de envio do formulário
            const formData = new FormData(form);
            const data = {};
            
            formData.forEach((value, key) => {
                if (key === 'categorias[]') {
                    if (!data.categorias) {
                        data.categorias = [];
                    }
                    data.categorias.push(value);
                } else {
                    data[key] = value;
                }
            });
            
            // Aqui você adicionaria o código para enviar os dados para o servidor
            console.log('Dados do formulário:', data);
            
            // Feedback visual de sucesso
            const modalElement = document.getElementById('modalInstrutor');
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();
            
            // Exibir mensagem de sucesso
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show';
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `
                <strong>Sucesso!</strong> Instrutor salvo com sucesso.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            `;
            
            document.querySelector('.content-header').insertAdjacentElement('afterend', alertDiv);
            
            // Remover alerta após 5 segundos
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
            
            // Resetar formulário
            form.reset();
            form.classList.remove('was-validated');
            
            // Recarregar a tabela (simulação)
            // Na prática, você faria uma chamada AJAX para obter os dados atualizados
        });
    </script>

