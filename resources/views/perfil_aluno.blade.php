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

        /* Estilo do menu lateral */
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
            z-index: 1000;
        }

        .sidebar button {
            background: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 0;
            width: 80%;
            transition: background-color 0.3s;
        }

        .sidebar button:hover {
            background-color: #00408d;
        }

        /* Botão desconectar posicionado no final do menu lateral */
        .sidebar .logout-btn {
            margin-top: auto;
            margin-bottom: 20px;
            width: 80%;
            background: #ff4d4d00;
        }

        /* Centraliza o conteúdo */
        .content {
            margin-left: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: calc(100% - 220px);
            min-height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
            max-width: 350px;
            background-color: #f9f9f9;
            color: #2d3748;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
        }

        .info {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
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
            background-color: #ca2131;
        }

        .edit-info-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .edit-info-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Menu lateral -->
    <div class="sidebar">
        <button onclick="window.location.href='{{ route('submeter.trabalho') }}'">Submeter Trabalho</button>
        <button onclick="window.location.href='#'">Trabalhos Submetidos</button>
        
        <!-- Botão de desconectar posicionado na parte inferior -->
        <form action="{{ route('logout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit" class="btn-block">Desconectar</button>
        </form>
    </div>

    <div class="content">
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
            <div class="btn-group">
                <button class="edit-info-btn">Solicitar Alterar Informações</button>
            </div>
            <div class="btn-group">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Sair</button>
                </form>
        </div>
    </div>
</body>
</html>

