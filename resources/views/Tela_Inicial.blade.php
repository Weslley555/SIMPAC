@extends('layouts.app')

@section('content')
<div class="container text-center" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
    <h1>Bem-vindo ao SIMPAC</h1>
    <p>Selecione uma das opções abaixo:</p>
    
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('login') }}" class="btn btn-primary mb-3" style="width: 200px;">Login Aluno</a>
        <a href="{{ route('admin_login') }}" class="btn btn-secondary mb-3" style="width: 200px;">Login Administrador</a> <!-- Implementado -->
        <a href="#" class="btn btn-success" style="width: 200px;">Login Avaliador</a> <!-- Para implementar depois -->
    </div>
</div>
@endsection

