<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Trabalho</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b); /* Gradiente laranja */
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
        }
        h1 {
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Painel do Avaliador</a>
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

    <div class="container mt-5">
        <h1>Avaliar Trabalho</h1>
        <form action="{{ route('avaliador.salvar_avaliacao', $trabalho->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="criterio1">Critério 1</label>
                <input type="number" step="0.1" class="form-control" id="criterio1" name="criterio1" required>
            </div>
            <div class="form-group">
                <label for="criterio2">Critério 2</label>
                <input type="number" step="0.1" class="form-control" id="criterio2" name="criterio2" required>
            </div>
            <div class="form-group">
                <label for="criterio3">Critério 3</label>
                <input type="number" step="0.1" class="form-control" id="criterio3" name="criterio3" required>
            </div>
            <div class="form-group">
                <label for="criterio4">Critério 4</label>
                <input type="number" step="0.1" class="form-control" id="criterio4" name="criterio4" required>
            </div>
            <div class="form-group">
                <label for="criterio5">Critério 5</label>
                <input type="number" step="0.1" class="form-control" id="criterio5" name="criterio5" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>