<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliar Trabalhos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Avaliar Trabalhos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabalhos as $trabalho)
                <tr>
                    <td>{{ $trabalho->titulo }}</td>
                    <td>{{ $trabalho->descricao }}</td>
                    <td>
                        <form action="{{ route('avaliador.avaliar', $trabalho->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Avaliar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>