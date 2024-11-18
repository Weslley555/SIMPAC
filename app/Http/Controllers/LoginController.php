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
            'matricula' => 'required|string',
            'senha' => 'required|string',
        ]);

        $credentials = [
            'matricula' => $request->input('matricula'),
            'password' => $request->input('senha'),  // campo padrão usado pelo Auth
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('aluno.dashboard');
        }

        return back()->withErrors(['message' => 'Credenciais inválidas!']);
    }

    public function logout()
    {
    Auth::logout();
    return redirect()->route('login');
    }



}



