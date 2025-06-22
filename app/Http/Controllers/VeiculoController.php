<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();  // ou get(), tanto faz
        return view('cadastro.form.veiculo', compact('veiculos'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'placa' => 'required',
            'renavam' => 'required',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'ano' => 'required',
            'cor' => 'required|string',
            'status' => 'required',
            'chassi' => 'required',
            'combustivel' => 'required',
            'observacoes' => 'nullable|string',
        ]);

        try {
            $veiculo = Veiculo::create($data);
            return response()->json($veiculo, 201);
        } catch (\Exception $e) {
            // Loga o erro pra debugging
            \Log::error('Erro ao salvar veículo: ' . $e->getMessage());

            // Resposta genérica pro cliente
            return response()->json([
                'error' => 'Erro ao salvar veículo. Tente novamente mais tarde.'
            ], 500);
        }
    }


    public function show(Veiculo $veiculo)
    {
        return response()->json($veiculo);
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $data = $request->validate([
            'placa' => 'required',
            'renavam' => 'required',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'ano' => 'required',
            'cor' => 'required|string',
            'status' => 'required',
            'chassi' => 'required',
            'combustivel' => 'required',
            'observacoes' => 'nullable|string',
        ]);

        $veiculo->update($data);
        return response()->json($veiculo);
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->back();
    }
}
