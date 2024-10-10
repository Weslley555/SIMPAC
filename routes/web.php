<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Página inicial
Route::get('/', function () {
    return view('Tela_Inicial'); // Certifique-se de que esta view exista
})->name('home');

// Login Aluno
Route::get('/login', function () {
    return view('login_aluno'); // Certifique-se de que a view 'login_aluno' exista
})->name('login');

// Autenticação Aluno
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Tela inicial do aluno após login
Route::get('/bem-vindo', function () {
    return view('Tela_ini_aluno');
})->name('bemvindo');

// Logout Aluno
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/perfil', function () {
    $aluno = auth()->user(); // Obtendo o aluno autenticado
    return view('perfil_aluno', compact('aluno')); // Passando o aluno para a view
})->name('perfil');

Route::post('/logout-to-login', [LoginController::class, 'logoutToLogin'])->name('logoutToLogin');

Route::get('/submeter-trabalho', function () {
    return view('submeter_trabalho'); // Certifique-se de que a view 'submeter_trabalho' exista
})->name('submeter.trabalho');

// Rotas do Administrador
Route::get('/admin/login', function () {
    return view('Adm_views.login_adm'); // Certifique-se de que a view de login do ADM exista
})->name('admin_login');

// Autenticação Administrador
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('login.authenticate.admin');

// Dashboard Administrador
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Logout Administrador
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Gerenciar Usuários, Trabalhos e Permissões
// Rota para gerenciar usuários
Route::get('/admin/gerenciar-usuarios', [UserController::class, 'index'])->name('admin.gerenciar_usuarios');

// Rota para criar um novo usuário
Route::get('/admin/cadastrar-usuario', [UserController::class, 'create'])->name('admin.cadastrar_usuario');

Route::delete('/admin/delete-usuario/{id}', [UserController::class, 'destroy'])->name('admin.delete_usuario');

Route::get('/admin/gerenciar-trabalhos', [AdminController::class, 'gerenciarTrabalhos'])->name('admin.gerenciar_trabalhos');
Route::get('/admin/gerenciar-permissoes', [AdminController::class, 'gerenciarPermissoes'])->name('admin.gerenciar_permissoes');
