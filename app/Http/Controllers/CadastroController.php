<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Funcionario;
use App\Models\Role;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index()
    {
        $permissao = Role::get();
        $alunos = Aluno::all();
        $instrutores = Funcionario::where('tipo', 'Instrutor')->get();
        return view('cadastro.index', compact('permissao','alunos','instrutores'));
    }
}
