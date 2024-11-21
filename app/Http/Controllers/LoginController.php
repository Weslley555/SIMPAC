<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Aluno;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'matricula' => 'required|string', // Altere para 'matricula' em vez de 'email'
            'senha' => 'required|string',
        ]);

        $matricula = $request->input('matricula'); // Captura a matrícula
        $senha = $request->input('senha'); // Captura a senha
        $aluno = Aluno::where('matricula', $matricula)->first(); // Consulta o aluno pela matrícula

        if ($aluno && Hash::check($senha, $aluno->senha)) {
            Auth::login($aluno); // Autentica o aluno
            return redirect()->route('aluno.dashboard'); // Redireciona para o dashboard do aluno
        }

        return back()->withErrors(['message' => 'Credenciais inválidas!']); // Caso falhe, retorna erro
    }
}
