<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Avaliador;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'matricula' => 'required|string',
            'senha' => 'required|string',
        ]);

        $usuario = Aluno::where('matricula', $request->input('matricula'))->first()
            ?? Avaliador::where('matricula', $request->input('matricula'))->first()
            ?? Admin::where('matricula', $request->input('matricula'))->first();

        if ($usuario && Hash::check($request->input('senha'), $usuario->senha)) {
            Auth::login($usuario);
            return redirect()->route('portal.aluno');
        } else {
            return back()->withErrors(['message' => 'Dados incorretos.']);
        }
    }
}