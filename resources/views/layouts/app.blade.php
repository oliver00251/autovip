<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Auto Escola VIP</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel - Autoescola')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="manifest" href="/manifest.json" />
    <meta name="theme-color" content="#1e90ff" />
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
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
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
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

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #232360;
            border-color: #232360;
        }

        .btn-secondary {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }

        .btn-secondary:hover,
        .btn-secondary:focus {
            background-color: #c40820;
            border-color: #c40820;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @auth
                <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="logo-container d-flex align-items-center">
                        <h5 class="logo-text">Auto Escola VIP</h5>
                    </div>
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="/dashboard">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gerenciar.index', ['parametro' => 'alunos']) }}">
                                    <i class="bi bi-people me-2"></i>
                                    Alunos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('gerenciar.index', ['parametro' => 'funcionarios']) }}">
                                    <i class="bi bi-person-badge me-2"></i>
                                    Funcionários
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('aulas.index') }}">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    Aulas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('veiculos.index') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Sair
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            @endauth

            <!-- Main Content -->
            <div class="col-md ms-sm-auto col-lg px-md-4">
                @yield('content')
                <button id="install-button" style="display: none;">Instalar App</button>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js')
                .then(reg => console.log('SW registrado:', reg.scope))
                .catch(err => console.error('Falha no SW:', err));
        });
    }

    let deferredPrompt;
    const installButton = document.getElementById('install-button');

    window.addEventListener('beforeinstallprompt', (e) => {
        // Impede o prompt automático
        e.preventDefault();
        deferredPrompt = e;
        // Exibe o botão
        installButton.style.display = 'block';
    });

    installButton.addEventListener('click', () => {
        // Esconde o botão
        installButton.style.display = 'none';
        // Mostra o prompt de instalação
        if (deferredPrompt) {
            deferredPrompt.prompt();
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('Usuário aceitou instalar o app');
                } else {
                    console.log('Usuário recusou instalar o app');
                }
                deferredPrompt = null;
            });
        }
    });
</script>

</html>
