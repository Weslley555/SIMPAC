<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhos Submetidos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Trabalhos Submetidos</h1>
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
                @foreach ($trabalhos as $trabalho)
                <tr>
                    <td>{{ $trabalho->titulo }}</td>
                    <td>{{ $trabalho->responsavel->nome }}</td>
                    <td>
                        @foreach ($trabalho->membros as $membro)
                            {{ $membro->nome }}@if (!$loop->last), @endif
                        @endforeach
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
            </tbody>
        </table>
    </div>
</body>
</html>
