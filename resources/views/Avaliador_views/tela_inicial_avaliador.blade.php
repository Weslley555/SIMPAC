<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela do Avaliador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradiente laranja */
            height: 100vh;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            padding: 20px;
            display: flex;
            flex-direction: column;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: block;
            text-align: center;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }
        .navbar {
            margin-bottom: 20px;
            width: 100%;
        }
        .btn-logout {
            margin-top: auto;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Avaliador</h3>
        <a href="{{ route('avaliador.meus_dados') }}">Meus Dados</a>
        <a href="{{ route('avaliador.trabalhos') }}">Trabalhos</a>
        <a href="{{ route('avaliador.historico') }}">Histórico</a>
        <form action="{{ route('avaliador.logout') }}" method="POST" class="btn-logout">
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Desconectar</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Bem-vindo, Avaliador</h1>
        <p>Selecione uma das opções na barra lateral.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>