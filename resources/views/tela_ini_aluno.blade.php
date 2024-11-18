<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #001f3f;
            background-size: 8px 8px;
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

        /* Centraliza o conteúdo de boas-vindas */
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

        .logo {
            width: 50px;
            height: auto;
            margin-bottom: 20px;
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

        .welcome-message {
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Menu lateral -->
    <div class="sidebar">
        <button onclick="window.location.href='{{ route('submeter.trabalho') }}'">Submeter Trabalho</button>
        <button onclick="window.location.href='{{ route('aluno.historico_trabalhos') }}'">Trabalhos Submetidos</button>
        <button onclick="window.location.href='{{ route('aluno.perfil') }}'">Perfil</button>
        
        <!-- Botão de desconectar posicionado na parte inferior -->
        <form action="{{ route('logout') }}" method="POST" class="logout-btn">
            @csrf
            <button type="submit" class="btn-block">Desconectar</button>
        </form>
    </div>

    <!-- Conteúdo centralizado -->
    <div class="content">
        <div class="container">
            <img class="logo" src="https://th.bing.com/th/id/R.4ad702d6515c56ec4995268a8479a04c?rik=pF8Mj1GVzgvQ4w&pid=ImgRaw&r=0" alt="Logo Univicosa">
            <p class="greeting">Olá, Tudo bem?</p>
            <!-- Exibe dinamicamente o nome do aluno -->
            <h1 class="welcome-message">Seja bem-vindo<br>{{ $aluno->nome ?? 'Aluno' }}</h1>
            <img class="profile-pic" src="https://via.placeholder.com/150" alt="Foto de Perfil">
        </div>
    </div>
</body>
</html>
