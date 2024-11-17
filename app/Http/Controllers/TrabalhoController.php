<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabalho;
use App\Models\Aluno;

class TrabalhoController extends Controller
{
    // Exibir formulário de submissão de trabalho
    public function create()
    {
        $alunos = Aluno::all();  // Recupera todos os alunos para o formulário
        return view('submeter_trabalho', compact('alunos')); // Passa os alunos para a view
    }

    // Submeter o trabalho
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'responsavel_id' => 'required|exists:alunos,id', // Responsável
            'titulo' => 'required|string|max:255', // Título
            'descricao' => 'required|string', // Descrição
            'modelo_avaliativo' => 'required|string', // Modelo avaliativo
            'arquivo' => 'required|file|mimes:pdf,docx,doc', // Validação de arquivo
            'membros' => 'nullable|array',  // Permitir membros opcionais
            'membros.*' => 'exists:alunos,id', // Validação dos membros
        ]);

        // Criar o trabalho
        $trabalho = Trabalho::create([
            'responsavel_id' => $request->responsavel_id,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'modelo_avaliativo' => $request->modelo_avaliativo,
            'arquivo' => $request->file('arquivo')->store('trabalhos'), // Armazenar o arquivo
        ]);

        // Associar membros ao trabalho
        if ($request->has('membros')) {
            foreach ($request->membros as $membroId) {
                $trabalho->membros()->attach($membroId); // Associar os membros
            }
        }

        // Redirecionar com sucesso
        return redirect()->route('trabalhos.index')->with('success', 'Trabalho submetido com sucesso!');
    }
}
