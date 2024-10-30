<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela do Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centralizando horizontalmente */
        }
        .navbar {
            margin-bottom: 20px;
            width: 100%; /* Faz a navbar ocupar toda a largura */
        }
        .container {
            text-align: center; /* Centralizando o texto */
            color: white; /* Mudando a cor do texto para branco */
            margin-top: 20px; /* Espaçamento do topo */
            flex-grow: 1; /* Permite que a div cresça e ocupe o espaço disponível */
            display: flex;
            flex-direction: column;
            align-items: center; /* Centralizando os botões */
            justify-content: flex-start; /* Alinhando o conteúdo no topo */
        }
        .btn-custom {
            width: 200px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Painel do Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Desconectar</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h1>Bem-vindo, Administrador</h1>
        <p>Selecione uma das opções abaixo:</p>
        <div>
            <a href="{{ route('admin.gerenciar_usuarios') }}" class="btn btn-primary btn-custom">Gerenciar Usuário</a>
            <a href="{{ route('admin.gerenciar_trabalhos') }}" class="btn btn-secondary btn-custom">Gerenciar Trabalhos</a>
            <a href="{{ route('admin.gerenciar_permissoes') }}" class="btn btn-success btn-custom">Gerenciar Permissões</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
