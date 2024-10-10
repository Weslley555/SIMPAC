<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Aqui você deve buscar os usuários do banco de dados
        // Exemplo fictício de usuários
        $usuarios = [
            ['id' => 1, 'nome' => 'João Silva', 'matricula' => '12345', 'tipo' => 'aluno'],
            ['id' => 2, 'nome' => 'Maria Oliveira', 'matricula' => '67890', 'tipo' => 'professor'],
            // Adicione mais usuários conforme necessário
        ];

        return view('Adm_views.gerenciar_usuarios', compact('usuarios'));
    }

    public function create()
    {
        return view('Adm.views.cadastrar_usuario');
    }

    public function destroy($id)
{
    // Aqui você deve implementar a lógica para deletar o usuário do banco de dados
    // Exemplo fictício de deleção (substitua pela lógica real)
    // User::find($id)->delete(); // Descomente e ajuste conforme sua lógica de usuários

    return redirect()->route('admin.gerenciar_usuarios')->with('success', 'Usuário deletado com sucesso!');
}


    // Adicione outros métodos para salvar, editar, etc.
}

