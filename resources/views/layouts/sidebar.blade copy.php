@php
    $role = auth()->check() ? auth()->user()->name : null;
@endphp

{{-- <style>
    .custom-sidebar {
        background-color: #ffffff;
        border-right: 1px solid #dee2e6;
        height: 100vh;
        padding: 1rem;
        box-shadow: 2px 0 5px rgba(0,0,0,0.05);
    }

    .custom-sidebar .logo {
        text-align: center;
        margin-bottom: 1rem;
    }

    .custom-sidebar .logo img {
        width: 100px;
    }

    .custom-sidebar .nav-link {
        color: #333;
        font-weight: 500;
        display: flex;
        align-items: center;
        padding: 0.6rem 1rem;
        border-radius: 0.4rem;
        transition: all 0.3s ease;
    }

    .custom-sidebar .nav-link i {
        margin-right: 0.6rem;
        font-size: 1.2rem;
    }

    .custom-sidebar .nav-link:hover {
        background-color: rgba(220, 53, 69, 0.1);
        color: #DD0922;
    }

    .custom-sidebar .nav-link.active {
        background-color: #DD0922;
        color: #fff;
    }

    .custom-sidebar hr {
        margin: 1rem 0;
        border-color: #ddd;
    }

    .custom-sidebar .section-title {
        font-size: 0.85rem;
        text-transform: uppercase;
        color: #888;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
        padding-left: 1rem;
    }
</style>

<div class="d-none d-md-block custom-sidebar">
    <div class="logo">
        <img src="https://autoescolavip.com.br/wp-content/uploads/2022/01/WhatsApp_Image_2022-01-27_at_11.03.42-removebg-preview.png" alt="Logo">
    </div>
    <hr>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('cadastro.index') ? 'active' : '' }}" href="{{ route('cadastro.index') }}">
                <i class="bi bi-person-plus"></i> Cadastro
            </a>
        </li>

        @if(in_array($role, ['instrutor', 'recepcionista','admin']))
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('aulas.*') ? 'active' : '' }}" href="{{ route('aulas.index') }}">
                <i class="bi bi-journal-check"></i> Aulas
            </a>
        </li>
        @endif

        @if($role === 'recepcionista')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('agendamentos.*') ? 'active' : '' }}" href="{{ route('agendamentos.index') }}">
                <i class="bi bi-calendar-check"></i> Agendamentos
            </a>
        </li>
        @endif

        @if($role === 'admin')
        <div class="section-title">Administração</div>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('relatorios.*') ? 'active' : '' }}" href="{{ route('relatorios.index') }}">
                <i class="bi bi-bar-chart-line"></i> Relatórios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                <i class="bi bi-people"></i> Usuários
            </a>
        </li>
        <li class="nav-item mt-2">
            <a class="nav-link {{ request()->routeIs('config.*') ? 'active' : '' }}" href="{{ route('config.index') }}">
                <i class="bi bi-gear"></i> Configurações
            </a>
        </li>
        @endif
    </ul>
</div> --}}
