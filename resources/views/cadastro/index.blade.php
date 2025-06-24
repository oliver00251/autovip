@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Área de Cadastros</h2>
        <div class="row">

            @if ($exibir === 'alunos')
                <!-- Card Aluno -->
                <div class="col-md-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de Aluno</h5>
                            <p class="card-text">Gerencie os dados dos alunos.</p>
                            <a data-bs-toggle="modal" data-bs-target="#modalCadastroAluno" class="btn btn-light">Cadastrar</a>
                        </div>
                    </div>
                </div>

                @include('cadastro.form.aluno')
                @include('cadastro.table.geral') {{-- Ou um table específico pra alunos se quiser --}}
            
            @elseif ($exibir === 'funcionarios')
                <!-- Card Funcionário -->
                <div class="col-md-6">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Cadastro de Funcionário</h5>
                            <p class="card-text">Gerencie os dados dos funcionários.</p>
                            <a data-bs-toggle="modal" data-bs-target="#modalCadastroFuncionario" class="btn btn-light">Cadastrar</a>
                        </div>
                    </div>
                </div>

                @include('cadastro.form.instrutor')
                @include('cadastro.table.geral') {{-- Ou um table específico pra funcionarios se quiser --}}
            
            @else
                <div class="col-12">
                    <div class="alert alert-warning">
                        Nenhuma categoria selecionada.
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
