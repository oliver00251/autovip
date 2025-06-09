<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel - Autoescola')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="manifest" href="/manifest.json" />
<meta name="theme-color" content="#1e90ff" />

    @stack('styles')
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Autoescola</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    <ul class="navbar-nav me-auto">
                       {{--  <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cadastro.index') }}">Cadastro</a>
                        </li>
                       {{--  <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Perfil</a>
                        </li> --}}
                       {{--  <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings') }}">Configurações</a>
                        </li> --}}
                    </ul>
                    <div class="ms-auto d-flex align-items-center">
                        <span class="text-white me-3">Olá, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Sair</button>
                        </form>
                    </div>
                @else
                    <div class="ms-auto d-flex align-items-center">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>



    <div class="container-fluid">
        <div class="row">
            @auth
                {{-- Sidebar --}}
                <aside class="col-md-2 bg-light d-none d-md-block p-3 border-end" style="min-height: 100vh;">
                    @include('layouts.sidebar')
                </aside>
            @endauth

            {{-- Conteúdo principal --}}
            <main class="col-md p-4">
                <h4 class="mb-4">@yield('page-title')</h4>
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="text-center mt-4 mb-2 text-muted small">
        &copy; {{ date('Y') }} Autoescola - Todos os direitos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <style>
        .bg-dark {
            --bs-bg-opacity: 1;
            background-color: #2C2C74 !important
        }

        th {
            background: #0d6efd !important;
            color: #fff !important;
        }
    </style>

</body>
<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/service-worker.js')
      .then(reg => console.log('SW registrado:', reg.scope))
      .catch(err => console.error('Falha no SW:', err));
  });
}
</script>

</html>
