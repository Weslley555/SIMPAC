<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function logout()
    {
        Auth::guard('admin')->logout();  // Verifica se o guard 'admin' está configurado corretamente
        return redirect()->route('admin.login');  // Redireciona para a página de login do admin
    }

    public function showLoginForm()
    {
        return view('Adm_views.Login_Adm'); // View de login do administrador
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'senha' => 'required|string',
        ]);

        $usuario = $request->input('usuario');
        $senha = $request->input('senha');

        $admin = Admin::where('usuario', $usuario)->first();

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
        return view('Adm_views.cadastrar_usuario'); // View para cadastrar usuário
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255',
            'matricula' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:8',
            'tipo' => 'required|string',
        ]);

        // Criação do novo usuário
        User::create([ // Certifique-se de que está usando o modelo correto
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'senha' => Hash::make($request->senha), // Senha criptografada
            'tipo_usuario' => $request->tipo,
        ]);

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function gerenciarUsuarios()
    {
        $usuarios = User::all(); // Substitua pelo seu modelo de usuários
        return view('Adm_views.gerenciar_usuarios', compact('usuarios'));
    }

    public function gerenciarTrabalhos()
    {
        return view('Adm_views.gerenciar_trabalhos');
    }

    public function gerenciarPermissoes()
    {
        return view('Adm_views.gerenciar_permissoes');
    }

    public function destroy($id)
    {
        // Aqui você deve implementar a lógica para deletar o usuário do banco de dados
        User::findOrFail($id)->delete(); // Deletando o usuário pelo ID

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário deletado com sucesso!');
    }
}
