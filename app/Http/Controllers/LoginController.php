<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $matricula = $request->input('matricula');
        $senha = $request->input('senha');

        // Verificação simples de credenciais (substitua por lógica real)
        if ($matricula == '123456' && $senha == 'senha123') {
            // Aqui você pode definir a lógica para autenticar o usuário,
            // por exemplo, salvando a sessão, definindo o usuário autenticado, etc.
            // Exemplo:
            $request->session()->put('user_id', $matricula); // Exemplo simples
            return redirect()->route('bemvindo');
        }

        // Se as credenciais forem inválidas, redireciona de volta com erros
        return back()->withErrors(['message' => 'Credenciais inválidas!']);
    }

    public function logout()
    {
        // Destruir sessão e/ou outras ações de logout
        session()->flush();

        // Redirecionar para a página de login
        return redirect()->route('bemvindo');
    }

    public function logoutToLogin()
    {
        // Destruir sessão e/ou outras ações de logout
        session()->flush();

        // Redirecionar para a página de login
        return redirect()->route('login'); // Redireciona para a página de login
    }

}


