<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login_aluno');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/bem-vindo', function () {
    return view('Tela_ini_aluno');
})->name('bemvindo');

// Rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
;