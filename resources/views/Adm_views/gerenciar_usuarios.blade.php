<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            margin-top: 20px;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-custom {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="{{ route('admin.dashboard')}}">Painel do Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.gerenciar_usuarios') }}">Gerenciar Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.gerenciar_trabalhos') }}">Gerenciar Trabalhos</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Desconectar</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Gerenciar Usuários</h1>
        
        <!-- Botões para cadastrar diferentes tipos de usuários -->
        <a href="{{ route('admin.cadastrar_aluno') }}" class="btn btn-primary btn-custom">Cadastrar Aluno</a>
        <a href="{{ route('admin.cadastrar') }}" class="btn btn-secondary btn-custom">Cadastrar Administrador</a>
        <a href="{{ route('admin.cadastrar_avaliador') }}" class="btn btn-info btn-custom">Cadastrar Avaliador</a>
        
        <!-- Alunos -->
        <div class="mb-4">
            <h2>Alunos</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->matricula }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.delete_usuario', $aluno->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Administradores -->
        <div class="mb-4">
            <h2>Administradores</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($administradores as $admin)
                    <tr>
                        <td>{{ $admin->nome }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.delete_usuario', $admin->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Avaliadores -->
        <div class="mb-4">
            <h2>Avaliadores</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($avaliadores as $avaliador)
                    <tr>
                        <td>{{ $avaliador->nome }}</td>
                        <td>{{ $avaliador->matricula }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('admin.delete_usuario', $avaliador->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>