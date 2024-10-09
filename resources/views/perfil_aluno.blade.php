<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid #007bff;
            object-fit: cover;
            margin-bottom: 15px;
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        .info {
            margin: 10px 0;
            font-size: 18px;
            color: #555;
        }
        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <img class="profile-pic" src="https://via.placeholder.com/150" alt="Foto de Perfil">
            <h1>{{ $aluno->name ?? 'Nome do Aluno' }}</h1>
        </div>
        <div class="info">
            <strong>Email:</strong> {{ $aluno->email ?? 'Email do Aluno' }}
        </div>
        <div class="info">
            <strong>Matrícula:</strong> {{ $aluno->matricula ?? 'Matrícula do Aluno' }}
        </div>
        <div class="info">
            <strong>Curso:</strong> {{ $aluno->curso ?? 'Curso do Aluno' }}
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Sair</button>
        </form>
    </div>
</body>
</html>
