@extends('layouts.app')

@section('content')
<div class="container text-center" style="background: linear-gradient(to bottom, #ff9800, #ffcc80); padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); margin-top: 50px;">
    <h1 class="mb-4" style="color: #ffffff;">Bem-vindo ao SIMPAC</h1>
    <p style="font-size: 1.2rem; color: #ffffff;">Selecione uma das opções abaixo:</p>
    
    <div class="d-flex flex-column align-items-center">
        <a href="{{ route('login') }}" class="btn btn-primary mb-3" style="width: 220px; font-size: 1.1rem;">Login Aluno</a>
        <a href="{{ route('admin.login') }}" class="btn btn-secondary mb-3" style="width: 220px; font-size: 1.1rem;">Login Administrador</a>
        <a href="#" class="btn btn-success" style="width: 220px; font-size: 1.1rem;">Login Avaliador</a>
    </div>
</div>
@endsection


