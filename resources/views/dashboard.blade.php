@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
@auth
<div class="container-fluid py-5">

    <!-- FILTRO POR UNIDADE -->
    <div class="row mb-4">
        <div class="col-md-4">
            <select class="form-select shadow-sm" id="filtroUnidade" onchange="filtrarUnidade()">
                <option value="">Filtrar por Unidade</option>
                <option value="140">São Mateus</option>
                <option value="1140">Barro Branco</option>
            </select>
        </div>
    </div>

    <!-- CARDS ESTILO MODERNO -->
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Aulas Hoje</h6>
                            <h3 class="fw-bold">12</h3>
                        </div>
                        <div class="icon-box bg-primary text-white">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Alunos Ativos</h6>
                            <h3 class="fw-bold">83</h3>
                        </div>
                        <div class="icon-box bg-success text-white">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Instrutores</h6>
                            <h3 class="fw-bold">5</h3>
                        </div>
                        <div class="icon-box bg-warning text-white">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-modern">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">KM Rodados</h6>
                            <h3 class="fw-bold">176km</h3>
                        </div>
                        <div class="icon-box bg-danger text-white">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- GRÁFICOS -->
    <div class="row mt-5 g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Aproveitamento por Aluno</h5>
                    <canvas id="graficoAproveitamentoAlunos" height="230"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Média de KM por Aula (7 dias)</h5>
                    <canvas id="graficoKM" height="230"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-FdGRQus++kG8GzVKt8Od90KwjUwUXF3qTeNTV7oCbR6DpZ1U5vHqRAZBKeF2M3hSpzAz4bzU4dk5N69HrbJDvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx1 = document.getElementById('graficoAproveitamentoAlunos');
        const ctx2 = document.getElementById('graficoKM');

        if (ctx1 && ctx2) {
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Lucas', 'Bruna', 'Carlos', 'Fernanda', 'João'],
                    datasets: [{
                        label: 'Aproveitamento (%)',
                        data: [92, 85, 78, 88, 95],
                        backgroundColor: '#0d6efd'
                    }]
                },
                options: {
                    scales: { y: { beginAtZero: true, max: 100 } }
                }
            });

            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                    datasets: [{
                        label: 'KM/Aula',
                        data: [14.5, 13.2, 12.7, 15.1, 14.8, 10.3, 0],
                        borderColor: '#198754',
                        backgroundColor: 'rgba(25,135,84,0.1)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    scales: { y: { beginAtZero: true } }
                }
            });
        } else {
            console.warn('Canvas dos gráficos não encontrados no DOM.');
        }
    });
</script>



<style>
.card-modern {
    backdrop-filter: blur(5px);
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid #e1e1e1;
    border-radius: 1rem;
    transition: transform 0.3s ease;
}
.card-modern:hover {
    transform: scale(1.02);
}
.icon-box {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    font-size: 20px;
    border-radius: 12px;
}
</style>

