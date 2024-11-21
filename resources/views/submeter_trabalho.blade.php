<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submeter Trabalho</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #007bff, #00d4ff);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-top: 80px; /* Espaço para a navbar fixa */
        }
        h1 {
            color: #333;
        }
        .navbar {
            background-color: #343a40;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white;
        }
        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #ff7e5f;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ route('aluno.dashboard') }}">Portal do Aluno</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('submeter.trabalho') }}">Submeter Trabalho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aluno.historico_trabalhos') }}">Trabalhos Submetidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aluno.perfil') }}">Perfil</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Desconectar</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Submeter Trabalho</h1>
        <form action="{{ route('trabalhos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="responsavel_nome">Nome do Responsável</label>
                <input type="text" class="form-control" id="responsavel_nome" name="responsavel_nome" value="{{ Auth::user()->nome }}" readonly>
            </div>
            <div class="form-group">
                <label for="responsavel_email">Email do Responsável</label>
                <input type="email" class="form-control" id="responsavel_email" name="responsavel_email" value="{{ Auth::user()->email }}" readonly>
            </div>
            <div class="form-group">
                <input type="hidden" name="responsavel_id" value="{{ Auth::id() }}">
            </div>
        
            <div class="form-group">
                <label for="titulo">Título do Trabalho</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
        
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="modelo_avaliativo">Modelo Avaliativo</label>
                <input type="text" class="form-control" id="modelo_avaliativo" name="modelo_avaliativo" required>
            </div>
        
            <div class="form-group">
                <label for="arquivo">Arquivo (opcional)</label>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo">
            </div>
        
            <div class="form-group">
                <label for="membros">Outros Membros</label>
                <input type="text" class="form-control" id="membros" name="membros[]">
                <div id="outrosMembros"></div>
                <button type="button" class="btn btn-secondary mt-2" id="adicionarMembro">Adicionar Membro</button>
            </div>
        
            <button type="submit" class="btn btn-primary btn-block">Submeter</button>
        </form>
        
        <script>
            document.getElementById('adicionarMembro').addEventListener('click', function() {
                var novoMembro = document.createElement('input');
                novoMembro.type = 'text';
                novoMembro.classList.add('form-control', 'mt-2');
                novoMembro.name = 'membros[]';
                document.getElementById('outrosMembros').appendChild(novoMembro);
            });
        </script>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>