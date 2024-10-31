<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliador;
use Illuminate\Support\Facades\Hash;

class AvaliadorController extends Controller
{
    public function create()
    {
        return view('Avaliador_views.cadastrar_avaliador');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:avaliadors,email',
            'senha' => 'required|string|min:8',
            'area_de_atuacao' => 'required|string|max:255', // Validação para área de atuação
        ]);

        Avaliador::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'area_de_atuacao' => $request->area_de_atuacao, // Incluindo área de atuação
        ]);

        return redirect()->route('Adm_views.gerenciar_usuarios')->with('success', 'Avaliador cadastrado com sucesso!');
    }

    public function gerenciarAvaliadores()
    {
        $avaliadores = Avaliador::all();
        return view('Adm_views.gerenciar_usuarios', compact('avaliadores'));
    }

    public function destroy($id)
    {
        Avaliador::findOrFail($id)->delete();
        return redirect()->route('Adm_views.gerenciar_usuarios')->with('success', 'Avaliador deletado com sucesso!');
    }
}
