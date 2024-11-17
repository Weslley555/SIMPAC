<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #001f3f;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 200px;
            background-color: #007bff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }
        .container {
            margin-left: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: calc(100% - 220px);
            min-height: 100vh;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <button onclick="window.location.href='#'">Trabalhos Submetidos</button>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger mt-5">Desconectar</button>
        </form>
    </div>
    <div class="container">
        <div class="text-center">
            <img class="profile-pic" src="https://via.placeholder.com/150" alt="Foto de Perfil">
            <h1>{{ $aluno->nome ?? 'Nome do Aluno' }}</h1>
            <p><strong>Email:</strong> {{ $aluno->email ?? 'Email não informado' }}</p>
            <p><strong>Matrícula:</strong> {{ $aluno->matricula ?? 'Matrícula não informada' }}</p>
        </div>
    </div>
</body>
</html>
