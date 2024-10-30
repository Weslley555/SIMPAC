<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;

// Rota para exibir o formulário de cadastro de novo usuário
Route::get('/admin/cadastrar-usuario', [AdminController::class, 'create'])->name('admin.cadastrar_usuario');

// Rota para gerenciar usuários
Route::get('/admin/gerenciar-usuarios', [AdminController::class, 'gerenciarUsuarios'])->name('admin.gerenciar_usuarios');

// Rota para armazenar um novo usuário
Route::post('/admin/cadastrar-usuario', [AdminController::class, 'store'])->name('admin.store_usuario'); // Atualizado para usar AdminController

// Rota para gerenciar trabalhos (ainda a ser implementado)
Route::get('/admin/gerenciar-trabalhos', [AdminController::class, 'gerenciarTrabalhos'])->name('admin.gerenciar_trabalhos');

// Rota para gerenciar permissões (ainda a ser implementado)
Route::get('/admin/gerenciar-permissoes', [AdminController::class, 'gerenciarPermissoes'])->name('admin.gerenciar_permissoes');

// Rota para exibir o formulário de login do administrador
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Rota para autenticar o administrador
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('login.authenticate.admin');

// Rota para o dashboard do administrador
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Rota para logout do administrador
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Rota para a página inicial
Route::get('/', function () {
    return view('Tela_Inicial');
})->name('home');

// Rota para exibir a página de login do aluno
Route::get('/login', function () {
    return view('login_aluno');
})->name('login');

// Rota para autenticar o aluno
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Rota para a tela inicial após login do aluno
Route::get('/bem-vindo', function () {
    return view('Tela_ini_aluno');
})->name('bemvindo');

// Rota para a tela de submeter trabalho
Route::get('/submeter-trabalho', function () {
    return view('submeter_trabalho'); // Certifique-se de que a view 'submeter_trabalho' exista
})->name('submeter.trabalho');

// Rota para a tela de perfil do aluno
Route::get('/perfil', function () {
    $aluno = auth()->user(); // Obtendo o aluno autenticado
    return view('perfil_aluno', compact('aluno')); // Passando o aluno para a view
})->name('perfil');

// Rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota de teste para conexão com o banco de dados
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexão com o banco de dados foi bem-sucedida!';
    } catch (\Exception $e) {
        return 'Erro na conexão: ' . $e->getMessage();
    }
});
