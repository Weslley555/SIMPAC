<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Avaliador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradiente laranja */
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centralizando horizontalmente */
            justify-content: center; /* Centralizando verticalmente */
            margin: 0;
        }
        .navbar {
            margin-bottom: 20px;
            width: 100%; /* Faz a navbar ocupar toda a largura */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adiciona sombra */
        }
        .container {
            text-align: center; /* Centralizando o texto */
            color: white; /* Mudando a cor do texto para branco */
            padding: 20px;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adiciona sombra */
            background: rgba(255, 255, 255, 0.1); /* Fundo semi-transparente */
        }
        .btn-custom {
            width: 200px;
            margin-bottom: 15px;
            transition: background-color 0.3s, transform 0.3s; /* Transições suaves */
        }
        .btn-custom:hover {
            background-color: #ff7e5f; /* Cor de fundo ao passar o mouse */
            transform: scale(1.05); /* Aumenta ligeiramente o tamanho ao passar o mouse */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="{{ route('avaliador.dashboard')}}">Painel do Avaliador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Meus Dados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trabalhos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Histórico</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('avaliador.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Desconectar</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        @if(Auth::guard('avaliador')->check())
            <h1>Bem-vindo, {{ Auth::guard('avaliador')->user()->nome }}</h1> <!-- Exibindo o nome do avaliador -->
        @else
            <h1>Bem-vindo, Avaliador</h1>
        @endif
        <p>Selecione uma das opções abaixo:</p>
        <div>
            <a href="{{ route('avaliador.avaliar_trabalhos') }}" class="btn btn-primary btn-custom">Avaliar Trabalhos</a>
            <a href="{{ route('avaliador.historico') }}" class="btn btn-secondary btn-custom">Histórico de Trabalhos Avaliados</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>