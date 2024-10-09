<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Models\Aluno;

// Rota para exibir a página inicial
Route::get('/', function () {
    return view('Tela_Inicial'); // Mudado para a nova view
})->name('home'); // Mantém o nome da rota como 'home'

// Rota para exibir a página de login do aluno
Route::get('/login', function () {
    return view('login_aluno'); // Certifique-se de que a view 'login_aluno' exista
})->name('login');

// Rota para autenticar o aluno
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Rota para a tela inicial após login
Route::get('/bem-vindo', function () {
    return view('Tela_ini_aluno');
})->name('bemvindo');

// Rota para logout (redireciona para a página de boas-vindas)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota para logout (redireciona para a página de login)
Route::post('/logout-to-login', [LoginController::class, 'logoutToLogin'])->name('logoutToLogin');

// Rota para a tela de perfil do aluno
Route::get('/perfil', function () {
    $aluno = auth()->user(); // Obtendo o aluno autenticado
    return view('perfil_aluno', compact('aluno')); // Passando o aluno para a view
})->name('perfil');

// Rota para a tela de submeter trabalho
Route::get('/submeter-trabalho', function () {
    return view('submeter_trabalho'); // Certifique-se de que a view 'submeter_trabalho' exista
})->name('submeter.trabalho');
