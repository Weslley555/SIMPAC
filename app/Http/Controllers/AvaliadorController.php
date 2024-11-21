<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliador;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Avaliacao;

class AvaliadorController extends Controller
{
    public function create()    
    {
        return view('Adm_views.cadastrar_avaliador');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:255|unique:avaliadores',
            'email' => 'required|email|unique:avaliadores,email',
            'senha' => 'required|string|min:8',
            'area_de_atuacao' => 'required|string|max:255',
        ]);

        Avaliador::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'senha' => Hash::make($request->senha), // Hashing the password
            'area_de_atuacao' => $request->area_de_atuacao,
        ]);

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Avaliador cadastrado com sucesso!');
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

    public function showLoginForm()
    {
        return view('Avaliador_views.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'senha' => 'required|string',
        ]);

        $avaliador = Avaliador::where('email', $request->email)->first();

        if ($avaliador && Hash::check($request->senha, $avaliador->senha)) {
            Auth::login($avaliador);
            return redirect()->route('avaliador.dashboard');
        }

        return back()->withErrors(['message' => 'Credenciais inválidas!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('avaliador.login');
    }

    public function dashboard()
    {
        return view('Avaliador_views.dashboard');
    }

    public function avaliarTrabalhos()
    {
        $trabalhos = Trabalho::where('avaliador_id', Auth::id())->where('status', 'pendente')->get();
        return view('Avaliador_views.avaliar_trabalhos', compact('trabalhos'));
    }

    public function avaliar($id)
    {
        $trabalho = Trabalho::findOrFail($id);
        return view('Avaliador_views.form_avaliacao', compact('trabalho'));
    }

    public function salvarAvaliacao(Request $request, $id)
    {
        $request->validate([
            'criterio1' => 'required|numeric|min:0|max:10',
            'criterio2' => 'required|numeric|min:0|max:10',
            'criterio3' => 'required|numeric|min:0|max:10',
            'criterio4' => 'required|numeric|min:0|max:10',
            'criterio5' => 'required|numeric|min:0|max:10',
        ]);

        $trabalho = Trabalho::findOrFail($id);

        $nota_final = ($request->criterio1 + $request->criterio2 + $request->criterio3 + $request->criterio4 + $request->criterio5) / 5;
        $situacao = $nota_final >= 6 ? 'Aprovado' : 'Reprovado';

        $avaliacao = new Avaliacao();
        $avaliacao->trabalho_id = $trabalho->id;
        $avaliacao->avaliador_id = Auth::id();
        $avaliacao->criterio1 = $request->criterio1;
        $avaliacao->criterio2 = $request->criterio2;
        $avaliacao->criterio3 = $request->criterio3;
        $avaliacao->criterio4 = $request->criterio4;
        $avaliacao->criterio5 = $request->criterio5;
        $avaliacao->nota_final = $nota_final;
        $avaliacao->situacao = $situacao;
        $avaliacao->save();

        $trabalho->status = 'avaliado';
        $trabalho->save();

        return redirect()->route('avaliador.avaliar_trabalhos')->with('success', 'Trabalho avaliado com sucesso!');
    }

    public function historico()
    {
        $trabalhos = Trabalho::where('avaliador_id', Auth::id())->where('status', 'avaliado')->with('avaliacao')->get();
        return view('Avaliador_views.historico', compact('trabalhos'));
    }

}