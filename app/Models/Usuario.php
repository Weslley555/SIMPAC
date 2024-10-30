<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Aqui você deve buscar os usuários do banco de dados
        $usuarios = Usuario::all(); // Buscando todos os usuários do banco

        return view('Adm_views.gerenciar_usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('Adm_views.cadastrar_usuario'); // Corrigido o caminho aqui
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
        Usuario::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'senha' => Hash::make($request->senha), // Senha criptografada
            'tipo_usuario' => $request->tipo,
        ]);

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        // Aqui você deve implementar a lógica para deletar o usuário do banco de dados
        Usuario::findOrFail($id)->delete(); // Deletando o usuário pelo ID

        return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário deletado com sucesso!');
    }

    // Adicione outros métodos para editar, atualizar, etc.
}
