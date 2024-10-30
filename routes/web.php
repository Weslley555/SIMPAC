<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;


// Agrupamento das rotas do administrador para organizar e aplicar middleware
Route::prefix('admin')->group(function () {
    Route::get('/cadastrar-usuario', [AdminController::class, 'create'])->name('admin.cadastrar_usuario');
    Route::post('/cadastrar-usuario', [AdminController::class, 'store'])->name('admin.store_usuario');
    Route::get('/gerenciar-usuarios', [AdminController::class, 'gerenciarUsuarios'])->name('admin.gerenciar_usuarios');
    Route::get('/gerenciar-trabalhos', [AdminController::class, 'gerenciarTrabalhos'])->name('admin.gerenciar_trabalhos');
    Route::get('/gerenciar-permissoes', [AdminController::class, 'gerenciarPermissoes'])->name('admin.gerenciar_permissoes');
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate.admin');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Página inicial e rotas de login do aluno
Route::get('/', function () { return view('Tela_Inicial'); })->name('home');
Route::get('/login', function () { return view('login_aluno'); })->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/bem-vindo', function () { return view('Tela_ini_aluno'); })->name('bemvindo');
Route::get('/perfil', function () {
    $aluno = auth()->user();
    return view('perfil_aluno', compact('aluno'));
})->name('perfil')->middleware('auth');
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

