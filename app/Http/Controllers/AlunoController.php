<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use App\Models\Trabalho;

class AlunoController extends Controller
{
    // Exibir formulário de cadastro de aluno
    public function create()
    {
        return view('Adm_views.cadastrar_aluno');
    }

    // Salvar aluno no banco de dados
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
            'senha' => bcrypt($request->senha),
        ]);

        return redirect()->route('Adm_views.gerenciar_usuarios')->with('success', 'Aluno cadastrado com sucesso!');
    }

    // Gerenciar alunos
    public function gerenciarAlunos()
    {
        $alunos = Aluno::all();
        return view('Adm_views.gerenciar_usuarios', compact('alunos'));
    }

    // Deletar aluno
    public function destroy($id)
    {
        Aluno::findOrFail($id)->delete();
        return redirect()->route('Adm_views.gerenciar_usuarios')->with('success', 'Aluno deletado com sucesso!');
    }

    // Exibir o perfil do aluno autenticado
    public function showProfile()
    {
        // Simulamos a autenticação buscando um email
        $aluno = Aluno::where('email', Auth::user()->email)->first();

        return view('perfil_aluno', compact('aluno'));
    }

        // Controlador associado à view
    public function portal()
    {
        $aluno = Aluno::where('email', Auth::user()->email)->first();
        return view('Tela_ini_aluno', compact('aluno'));
    }

    public function historicoTrabalhos()
    {
    $aluno = Auth::user();
    $trabalhos = Trabalho::where('aluno_id', $aluno->id)->where('status', 'avaliado')->get();
    return view('historico_trabalhos', compact('trabalhos'));
    }

    public function dashboard()
    {
        $aluno = Auth::user(); // Obtendo o aluno autenticado
        return view('tela_ini_aluno', compact('aluno'));
    }
}

