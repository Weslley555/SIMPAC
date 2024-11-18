<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliador;
use App\Models\Trabalho;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'required|email|unique:avaliadores,email',
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

        $email = $request->input('email');
        $senha = $request->input('senha');
        $avaliador = Avaliador::where('email', $email)->first();

        if ($avaliador && Hash::check($senha, $avaliador->senha)) {
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

    public function avaliar(Request $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $trabalho->status = 'avaliado';
        $trabalho->save();
        return redirect()->route('avaliador.avaliar_trabalhos')->with('success', 'Trabalho avaliado com sucesso!');
    }

    public function historico()
    {
        $trabalhos = Trabalho::where('avaliador_id', Auth::id())->where('status', 'avaliado')->get();
        return view('Avaliador_views.historico', compact('trabalhos'));
    }
}