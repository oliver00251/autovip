<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required',
            'email' => 'required|email',
            'tipo' => 'required',
            'permissao' => 'required',
            'codigo_filial' => 'required',
        ]);


        $cpfNumeros = preg_replace('/\D/', '', $validated['cpf']);
        $senha = '@mudar' . substr($cpfNumeros, 0, 6);

        // Cria o usuário
        $user = User::create([
            'name' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($senha),
            'role' => $validated['permissao'],
            'codigo_filial' => $validated['codigo_filial'],
        ]);

        // Cria o funcionário (associado ao user, se houver relacionamento)
        $funcionario = Funcionario::create([
            'nome' => $validated['nome'],
            'cpf' => $validated['cpf'],
            'email' => $validated['email'],
            'tipo' => $validated['tipo'],
            'permissao' => $validated['permissao'],
            'codigo_filial' => $validated['codigo_filial'],
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Funcionário cadastrado com sucesso!']);
    }

    public function update(Request $request, $id)
    {
        // Valida rápido
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'codigo_filial' => 'required|string|max:50',
            'tipo' => 'required|string|max:50',
            'permissao' => 'required|string|max:50',
        ]);

        $instrutor = Funcionario::find($id);
        if (!$instrutor) {
            return response()->json(['message' => 'Funcionário não encontrado.'], 404);
        }

        $instrutor->update($validated);

        return response()->json(['message' => 'Funcionário atualizado com sucesso.']);
    }

    // Deleta o instrutor (DELETE)
    public function destroy($id)
    {
        $instrutor = Funcionario::find($id);
        if (!$instrutor) {
            return response()->json(['message' => 'Instrutor não encontrado.'], 404);
        }

        $instrutor->delete();

        return response()->json(['message' => 'Instrutor excluído com sucesso.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
