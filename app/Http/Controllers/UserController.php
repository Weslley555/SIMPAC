<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Busca os usuários do banco de dados
        $usuarios = Usuario::all(); // Recupera todos os usuários

        return view('Adm_views.gerenciar_usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('Adm_views.cadastrar_usuario'); // Exibe o formulário de cadastro de usuário
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'tipo' => 'required|string',
            'matricula' => 'nullable|string|max:255',
            'identificacao' => 'nullable|string|max:255',
            'senha' => 'required|string|min:6|confirmed',
        ]);

        // Criação do novo usuário
        $usuario = new Usuario();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $usuario->matricula = $request->tipo === 'aluno' ? $request->matricula : null;
        $usuario->identificacao = $request->tipo !== 'aluno' ? $request->identificacao : null;
        $usuario->senha = bcrypt($request->senha);
        $usuario->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        // Busca o usuário pelo ID
        $usuario = Usuario::findOrFail($id);

        return view('Adm_views.editar_usuario', compact('usuario')); // Exibe o formulário de edição de usuário
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'tipo' => 'required|string',
            'matricula' => 'nullable|string|max:255',
            'identificacao' => 'nullable|string|max:255',
            'senha' => 'nullable|string|min:6|confirmed',
        ]);

        // Atualiza o usuário
        $usuario = Usuario::findOrFail($id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $usuario->matricula = $request->tipo === 'aluno' ? $request->matricula : null;
        $usuario->identificacao = $request->tipo !== 'aluno' ? $request->identificacao : null;

        // Atualiza a senha se fornecida
        if ($request->filled('senha')) {
            $usuario->senha = bcrypt($request->senha);
        }

        $usuario->save();

        // Redirecionar com mensagem de sucesso
        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Deleta o usuário do banco de dados
        Usuario::findOrFail($id)->delete();

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário deletado com sucesso!');
    }
}


