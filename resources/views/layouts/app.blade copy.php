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
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<link rel="manifest" href="/site.webmanifest" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


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
                    @include('layouts.sidebar')
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
                <button id="install-button" style="display: none;">Instalar App</button>

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

        #install-button {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #1e90ff;
  color: white;
  padding: 10px 20px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  font-size: 16px;
  z-index: 9999;
}

    </style>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

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
