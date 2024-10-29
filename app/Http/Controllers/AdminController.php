<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
