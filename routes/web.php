<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;

// Rotas do administrador
Route::prefix('admin')->group(function () {
    Route::get('/cadastrar', [AdminController::class, 'create'])->name('admin.cadastrar');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/gerenciar-usuarios', [AdminController::class, 'gerenciarUsuarios'])->name('admin.gerenciar_usuarios');
    Route::get('/gerenciar-trabalhos', [AdminController::class, 'gerenciarTrabalhos'])->name('admin.gerenciar_trabalhos');
    Route::get('/gerenciar-permissoes', [AdminController::class, 'gerenciarPermissoes'])->name('admin.gerenciar_permissoes');
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate.admin');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/gerenciar-usuarios-view', function () {
        return view('Adm_views.gerenciar_usuarios');
    })->name('admin.gerenciar_usuarios_view');

    Route::get('/admin/gerenciar-usuarios-view', function () {
        $alunos = \App\Models\Aluno::all();
        $administradores = \App\Models\Admin::all();
        $avaliadores = \App\Models\Avaliador::all();
    
        return view('Adm_views.gerenciar_usuarios', compact('alunos', 'administradores', 'avaliadores'));
    })->name('admin.gerenciar_usuarios_view');    
    

     // Adicionando rotas específicas para cadastro de aluno, administrador e avaliador
    Route::get('/cadastrar_aluno', [AlunoController::class, 'create'])->name('admin.cadastrar_aluno');
    Route::get('/cadastrar_adm', [AdminController::class, 'create'])->name('admin.cadastrar_adm');
    Route::get('/cadastrar_avaliador', [AvaliadorController::class, 'create'])->name('admin.cadastrar_avaliador');
    
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
Route::get('/bem-vindo', function () { return view('Tela_ini_aluno'); })->name('bemvindo');
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

