<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Funcionario;
use App\Models\Role;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index($parametro = null)
    {
        $permissao = Role::get();
        $exibir = $parametro;
        $alunos = Aluno::all();
        $instrutores = Funcionario::get();
        return view('cadastro.index', compact('permissao','alunos','instrutores','exibir'));
    }
}
