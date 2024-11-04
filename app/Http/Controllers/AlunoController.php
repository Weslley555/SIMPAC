<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    public function create()
    {
        return view('Adm_views.cadastrar_aluno');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:255|unique:alunos',
            'email' => 'required|email|unique:alunos,email',
            'senha' => 'required|string|min:8',
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('Adm_views.gerenciar_usuarios')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function gerenciarAlunos()
    {
        $alunos = Aluno::all();
        return view('Adm_views.gerenciar_usuarios', compact('alunos'));
    }

    public function destroy($id)
    {
        Aluno::findOrFail($id)->delete();
        return redirect()->route('Adm_views.gerenciar_usuarios')->with('success', 'Aluno deletado com sucesso!');
    }
}
