<?php

namespace App\Http\Controllers;

use App\Models\ItensAula;
use App\Models\PlanoAula;
use Illuminate\Http\Request;

class PlanoAulaController extends Controller
{
    // Lista todos os planos com itens carregados
    public function index()
    {
        $planos = PlanoAula::with('itens')->get();
        return view('aulas.index', compact('planos'));
    }

    // Exibe formulário de criação do plano
    public function create()
    {
        return view('plano-aula.create');
    }

    // Salva plano + itens
    public function store(Request $request)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'itens' => 'required|array|min:1',
        'itens.*.titulo' => 'required|string|max:255',
        'itens.*.descricao' => 'nullable|string',
    ]);

    $plano = PlanoAula::create([
        'titulo' => $validated['titulo'],
    ]);

    foreach ($validated['itens'] as $index => $item) {
        $plano->itens()->create([
            'titulo' => $item['titulo'],
            'descricao' => $item['descricao'] ?? null,
            'ordem' => $index, 
        ]);
    }

    return redirect()->route('aulas.index')->with('success', 'Plano cadastrado!');
}

}