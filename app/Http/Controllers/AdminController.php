<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;
use App\Models\Avaliador; // Importando a classe Avaliador
use App\Models\Trabalho; // Importando a classe Trabalho
use App\Models\User; 

class AdminController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('Adm_views.Login_Adm');
    }

    public function authenticate(Request $request)
    {
    $request->validate([
        'email' => 'required|string',
        'senha' => 'required|string',
    ]);

    $email = $request->input('email');
    $senha = $request->input('senha');
    $admin = Admin::where('email', $email)->first();

    if ($admin && Hash::check($senha, $admin->senha)) {
        $request->session()->put('admin_id', $admin->id);
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['message' => 'Credenciais inválidas!']);

    }

    public function dashboard()
    {
        return view('Adm_views.Tela_ini_adm');
    }

    public function create()
    {
        return view('Adm_views.Cadastrar_Adm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'senha' => 'required|string|min:8',
        ]);

        Admin::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Administrador cadastrado com sucesso!');
    }
    

    public function gerenciarUsuarios()
    {
    $alunos = Aluno::all();
    $avaliadores = Avaliador::all();
    $administradores = Admin::all();
    return view('Adm_views.gerenciar_usuarios', compact('alunos', 'avaliadores', 'administradores'));
    }
// Função para criar o Aluno!
    public function createAluno()
    {
        return view('Adm_views.cadastrar_aluno'); // Altere isso se a view estiver em outra pasta
    }
    

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Administrador deletado com sucesso!');
    }

    public function storeAluno(Request $request)
    {
    $request->validate([
        'nome' => 'required|string|max:255',
        'matricula' => 'required|string|unique:alunos,matricula',
        'email' => 'required|email|unique:alunos,email',
        'senha' => 'required|string|min:8',
        'tipo' => 'required|string', // opcional, dependendo de como você deseja tratar
    ]);

    Aluno::create([
        'nome' => $request->nome,
        'matricula' => $request->matricula,
        'email' => $request->email,
        'senha' => Hash::make($request->senha), // Criptografar a senha
        'tipo' => $request->tipo,
    ]);

    return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function gerenciarTrabalhos()
    {
        $trabalhosSemAvaliador = Trabalho::whereNull('avaliador_id')->get();
        $trabalhosComAvaliador = Trabalho::whereNotNull('avaliador_id')->get();
        $avaliadores = Avaliador::all();
        return view('Gerenciar_Trabalhos', compact('trabalhosSemAvaliador', 'trabalhosComAvaliador', 'avaliadores'));
    }

    public function atribuirAvaliador(Request $request, $id)
    {
        $trabalho = Trabalho::findOrFail($id);
        $trabalho->avaliador_id = $request->avaliador_id;
        $trabalho->status = 'pendente'; // Certifique-se de definir o status como 'pendente'
        $trabalho->save();

        return redirect()->route('admin.gerenciar_trabalhos')->with('success', 'Avaliador atribuído com sucesso!');
    }

}
