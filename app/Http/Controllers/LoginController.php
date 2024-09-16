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
        return redirect()->route('login');
    }
}


