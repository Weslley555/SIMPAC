<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $usuario = $request->input('usuario');
        $senha = $request->input('senha');
    
    // Debug para ver os dados capturados
        //dd($usuario, $senha); // Isto vai parar a execução e mostrar os dados fornecidos

        // Verificação simples de credenciais (substitua por lógica real)
        if ($usuario === 'admin' && hash_equals($senha, '1')) {
            // Autenticação bem-sucedida
            $request->session()->put('admin_id', $usuario);
            return redirect()->route('admin.dashboard');
        }
        
        

        return back()->withErrors(['message' => 'Credenciais inválidas!']);
    }

    public function dashboard()
    {
        return view('Adm_views.Tela_ini_adm'); // Alterado para o nome correto da pasta
    }

    
    public function Login()
    {
        return view('Adm_views.Tela_ini_adm'); // Alterado para o nome correto da pasta
    }
    
    // Exibir a tela de cadastro de usuários
    public function gerenciarUsuarios()
    {
        $usuarios = User::all(); // Substitua pelo seu modelo de usuários
        return view('Adm_views.gerenciar_usuarios', compact('usuarios'));
    }
    
    // Exibir a tela para gerenciar trabalhos
    public function gerenciarTrabalhos()
    {
        return view('Adm_views.gerenciar_trabalhos'); // Alterado para o nome correto da pasta
    }
    
    // Exibir a tela para gerenciar permissões
    public function gerenciarPermissoes()
    {
        return view('Adm_views.gerenciar_permissoes'); // Alterado para o nome correto da pasta
    }
}    