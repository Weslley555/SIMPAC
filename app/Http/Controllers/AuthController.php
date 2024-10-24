<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'matricula' => 'required|string',
            'senha' => 'required|string',
        ]);

        // Buscar o usuário pela matrícula
        $usuario = Usuario::where('matricula', $request->input('matricula'))->first();

        // Verificar se o usuário existe e se a senha está correta
        if ($usuario && Hash::check($request->input('senha'), $usuario->senha)) {
            // Autenticação bem-sucedida, redirecionar para o portal do aluno
            return redirect()->route('portal.aluno');
        } else {
            // Redirecionar de volta com erro
            return back()->withErrors(['message' => 'Dados incorretos.']);
        }
    }
}
