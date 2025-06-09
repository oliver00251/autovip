@php
    $role = auth()->check() ? auth()->user()->name : null;
@endphp

<div class="d-none d-md-block">
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <div class="d-flex justify-content-center">
                <div>
                    <img src="https://autoescolavip.com.br/wp-content/uploads/2022/01/WhatsApp_Image_2022-01-27_at_11.03.42-removebg-preview.png" alt="Logo" width="120">
                </div>
            </div>
            <hr>
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('cadastro.index') }}">
                <i class="bi bi-person-plus"></i> Cadastro
            </a>
        </li>

        {{-- Acesso comum: Aulas --}}
        @if(in_array($role, ['instrutor', 'recepcionista','admin']))
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('aulas.*') ? 'active' : '' }}" href="{{ route('aulas.index') }}">
                <i class="bi bi-journal-check"></i> Aulas
            </a>
        </li>
        @endif

        {{-- Agendamentos (recepcionista) --}}
        @if($role === 'recepcionista')
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('agendamentos.*') ? 'active' : '' }}" href="{{ route('agendamentos.index') }}">
                <i class="bi bi-calendar-check"></i> Agendamentos
            </a>
        </li>
        @endif

        {{-- Relatórios (admin) --}}
        @if($role === 'admin')
        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('relatorios.*') ? 'active' : '' }}" href="{{ route('relatorios.index') }}">
                <i class="bi bi-bar-chart-line"></i> Relatórios
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
                <i class="bi bi-people"></i> Usuários
            </a>
        </li>
        @endif

        {{-- Configurações (comum para admin ou para expandir depois) --}}
        @if(in_array($role, ['admin']))
        <li class="nav-item mt-3">
            <a class="nav-link {{ request()->routeIs('config.*') ? 'active' : '' }}" href="{{ route('config.index') }}">
                <i class="bi bi-gear"></i> Configurações
            </a>
        </li>
        @endif
    </ul>
</div>
