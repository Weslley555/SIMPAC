<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrabalhoController;

// Rotas do administrador
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.login.authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/cadastrar', [AdminController::class, 'create'])->name('admin.cadastrar');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/gerenciar-usuarios', [AdminController::class, 'gerenciarUsuarios'])->name('admin.gerenciar_usuarios');
    Route::get('/gerenciar-trabalhos', [AdminController::class, 'gerenciarTrabalhos'])->name('admin.gerenciar_trabalhos');
    Route::post('/trabalhos/atribuir/{id}', [AdminController::class, 'atribuirAvaliador'])->name('admin.trabalhos.atribuir');
    Route::delete('/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.delete_usuario');
    Route::get('/cadastrar-aluno', [AdminController::class, 'createAluno'])->name('admin.cadastrar_aluno');
    Route::post('/cadastrar-aluno', [AdminController::class, 'storeAluno'])->name('admin.cadastrar_aluno.store');
    Route::get('/cadastrar-avaliador', [AvaliadorController::class, 'create'])->name('admin.cadastrar_avaliador');
    Route::post('/cadastrar-avaliador', [AvaliadorController::class, 'store'])->name('admin.cadastrar_avaliador.store');
    Route::get('/cadastrar-adm', [AdminController::class, 'createAdm'])->name('admin.cadastrar_adm');
    Route::post('/cadastrar-adm', [AdminController::class, 'storeAdm'])->name('admin.cadastrar_adm.store');
});

// Rotas do aluno
Route::prefix('aluno')->group(function () {
    Route::get('/cadastrar', [AlunoController::class, 'create'])->name('aluno.cadastrar');
    Route::post('/store', [AlunoController::class, 'store'])->name('aluno.store');
    Route::get('/gerenciar', [AlunoController::class, 'gerenciarAlunos'])->name('aluno.gerenciar');
    Route::get('/perfil', [AlunoController::class, 'showProfile'])->name('aluno.perfil')->middleware('auth');
    Route::get('/historico-trabalhos', [AlunoController::class, 'historicoTrabalhos'])->name('aluno.historico_trabalhos')->middleware('auth');
});

// Rotas do avaliador
Route::prefix('avaliador')->group(function () {
    Route::get('/login', [AvaliadorController::class, 'showLoginForm'])->name('avaliador.login');
    Route::post('/login', [AvaliadorController::class, 'authenticate'])->name('avaliador.login.authenticate');
    Route::post('/logout', [AvaliadorController::class, 'logout'])->name('avaliador.logout');
    Route::get('/dashboard', [AvaliadorController::class, 'dashboard'])->name('avaliador.dashboard');
    Route::get('/avaliar-trabalhos', [AvaliadorController::class, 'avaliarTrabalhos'])->name('avaliador.avaliar_trabalhos');
    Route::post('/avaliar-trabalhos/{id}', [AvaliadorController::class, 'avaliar'])->name('avaliador.avaliar');
    Route::get('/historico', [AvaliadorController::class, 'historico'])->name('avaliador.historico');
});

// Página inicial e rotas de login do aluno
Route::get('/', function () { return view('Tela_Inicial'); })->name('home');
Route::get('/aluno/dashboard', [AlunoController::class, 'dashboard'])->name('aluno.dashboard');
Route::get('/login', function () { return view('login_aluno'); })->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/bem-vindo', function () { return view('Tela_ini_aluno'); })->name('bemvindo');

// Rota para a tela de submeter trabalho
Route::get('/submeter-trabalho', [TrabalhoController::class, 'create'])->name('submeter.trabalho');
Route::post('/trabalhos', [TrabalhoController::class, 'store'])->name('trabalhos.store');

// Rota para a tela de perfil do aluno
Route::get('/perfil', [AlunoController::class, 'showProfile'])->name('perfil')->middleware('auth');