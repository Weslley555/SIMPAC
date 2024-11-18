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
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'modelo_avaliativo' => 'required|string',
            'arquivo' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'membros' => 'nullable|array',
        ]);

        // Upload do arquivo
        $arquivo = null;
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo')->store('trabalhos', 'public');
        }

        // Criar o trabalho
        $trabalho = Trabalho::create([
            'responsavel_id' => Auth::id(),
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'modelo_avaliativo' => $request->modelo_avaliativo,
            'arquivo' => $arquivo,
        ]);

        // Associar membros
        if ($request->has('membros')) {
            foreach ($request->membros as $membroNome) {
                $membro = Aluno::where('nome', $membroNome)->first();
                if ($membro) {
                    $trabalho->membros()->attach($membro->id);
                }
            }
        }

        return redirect()->route('trabalhos.index')
            ->with('success', 'Trabalho submetido com sucesso!');
    }
}