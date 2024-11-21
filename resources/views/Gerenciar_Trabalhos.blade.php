<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Trabalhos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #00d4ff);
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Painel do Administrador</a>
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


    <div class="container mt-5">
        <h1>Gerenciar Trabalhos</h1>

        <h2>Trabalhos Sem Avaliador</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Responsável</th>
                    <th>Membros</th>
                    <th>Modelo Avaliativo</th>
                    <th>Arquivo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if ($trabalhosSemAvaliador && $trabalhosSemAvaliador->count() > 0)
                    @foreach ($trabalhosSemAvaliador as $trabalho)
                    <tr>
                        <td>{{ $trabalho->titulo }}</td>
                        <td>{{ $trabalho->responsavel->nome }}</td>
                        <td>
                            @if ($trabalho->membros)
                                @foreach ($trabalho->membros as $membro)
                                    {{ $membro->nome }}@if (!$loop->last), @endif
                                @endforeach
                            @else
                                Nenhum membro
                            @endif
                        </td>
                        <td>{{ $trabalho->modelo_avaliativo }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $trabalho->arquivo) }}" target="_blank">Baixar</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.trabalhos.atribuir', $trabalho->id) }}" method="POST">
                                @csrf
                                <select name="avaliador_id" required>
                                    @foreach ($avaliadores as $avaliador)
                                        <option value="{{ $avaliador->id }}">{{ $avaliador->nome }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary">Atribuir Avaliador</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Nenhum trabalho sem avaliador encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <h2>Trabalhos Com Avaliador</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Responsável</th>
                    <th>Membros</th>
                    <th>Modelo Avaliativo</th>
                    <th>Arquivo</th>
                    <th>Avaliador</th>
                </tr>
            </thead>
            <tbody>
                @if ($trabalhosComAvaliador && $trabalhosComAvaliador->count() > 0)
                    @foreach ($trabalhosComAvaliador as $trabalho)
                    <tr>
                        <td>{{ $trabalho->titulo }}</td>
                        <td>{{ $trabalho->responsavel->nome }}</td>
                        <td>
                            @if ($trabalho->membros)
                                @foreach ($trabalho->membros as $membro)
                                    {{ $membro->nome }}@if (!$loop->last), @endif
                                @endforeach
                            @else
                                Nenhum membro
                            @endif
                        </td>
                        <td>{{ $trabalho->modelo_avaliativo }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $trabalho->arquivo) }}" target="_blank">Baixar</a>
                        </td>
                        <td>{{ $trabalho->avaliador->nome }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Nenhum trabalho com avaliador encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>