<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrabalhoController;
use Illuminate\Support\Facades\DB;

// Rotas do administrador
Route::prefix('admin')->group(function () {
    Route::get('/cadastrar', [AdminController::class, 'create'])->name('admin.cadastrar');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/gerenciar-usuarios', [AdminController::class, 'gerenciarUsuarios'])->name('admin.gerenciar_usuarios');
    Route::get('/gerenciar-trabalhos', [AdminController::class, 'gerenciarTrabalhos'])->name('admin.gerenciar_trabalhos');
    Route::post('/trabalhos/atribuir/{id}', [AdminController::class, 'atribuirAvaliador'])->name('admin.trabalhos.atribuir');
    Route::get('/gerenciar-permissoes', [AdminController::class, 'gerenciarPermissoes'])->name('admin.gerenciar_permissoes');
    Route::delete('/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.delete_usuario');
    Route::get('/cadastrar-aluno', [AdminController::class, 'createAluno'])->name('admin.cadastrar_aluno');
    Route::post('/cadastrar-aluno', [AdminController::class, 'storeAluno'])->name('admin.cadastrar_aluno.store');
    Route::get('/cadastrar-avaliador', [AvaliadorController::class, 'create'])->name('admin.cadastrar_avaliador');
    Route::post('/cadastrar-avaliador', [AvaliadorController::class, 'store'])->name('admin.cadastrar_avaliador.store');
});

// Rotas do aluno
Route::prefix('aluno')->group(function () {
    Route::get('/cadastrar', [AlunoController::class, 'create'])->name('aluno.cadastrar');
    Route::post('/store', [AlunoController::class, 'store'])->name('aluno.store');
    Route::get('/gerenciar', [AlunoController::class, 'gerenciarAlunos'])->name('aluno.gerenciar');
    Route::get('/perfil', function () {
        $aluno = auth()->user();
        return view('perfil_aluno', compact('aluno'));
    })->name('aluno.perfil')->middleware('auth');
});

// Rotas do avaliador
Route::prefix('avaliador')->group(function () {
    Route::get('/cadastrar', [AvaliadorController::class, 'create'])->name('avaliador.cadastrar');
    Route::post('/store', [AvaliadorController::class, 'store'])->name('avaliador.store');
    Route::get('/gerenciar', [AvaliadorController::class, 'gerenciarAvaliadores'])->name('avaliador.gerenciar');
});

// Página inicial e rotas de login do aluno
Route::get('/', function () { return view('Tela_Inicial'); })->name('home');
Route::get('/login', function () { return view('login_aluno'); })->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rota para a tela de submeter trabalho
Route::get('/submeter-trabalho', [TrabalhoController::class, 'create'])->name('submeter.trabalho');
Route::post('/trabalhos', [TrabalhoController::class, 'store'])->name('trabalhos.store');

// Rota para a tela de perfil do aluno
Route::get('/perfil', function () {
    $aluno = auth()->user();
    return view('perfil_aluno', compact('aluno'));
})->name('perfil');

// Ajuste a rota do dashboard, utilizando o método correto do AlunoController
Route::middleware(['web'])->group(function () {
    Route::get('dashboard', [AlunoController::class, 'portal'])->name('aluno.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('trabalhos/criar', [TrabalhoController::class, 'create'])->name('trabalhos.create');
    Route::post('trabalhos', [TrabalhoController::class, 'store'])->name('trabalhos.store');
});