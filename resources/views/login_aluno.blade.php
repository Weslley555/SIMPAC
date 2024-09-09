<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal do Aluno</title>

    <!-- Fonte do Google (se preferir) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Incluindo o CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container img {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .login-container h1 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.2rem;
        }

        .input-group label {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.5rem;
        }

        .input-group input {
            padding: 0.8rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-button {
            background-color: #007bff;
            color: white;
            padding: 0.8rem;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            display: block;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #555;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Responsivo */
        @media screen and (max-width: 768px) {
            .login-container {
                padding: 1.5rem;
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo -->
        <img src="{{ asset('https://www.sejabixo.com.br/wp-content/uploads/2021/06/vestibular-univicosa.jpg') }}" alt="Logo Portal do Aluno">

        <!-- Título -->
        <h1>Portal do Aluno</h1>

        <!-- Formulário de Login -->
        <form action="/tela_ini_aluno" method="GET">
            <div class="input-group">
                <label for="matricula">Coloque sua matrícula</label>
                <input type="text" id="matricula" name="matricula" placeholder="Digite sua matrícula">
            </div>
            <div class="input-group">
                <label for="senha">Coloque sua senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
            </div>
        
            <!-- Botão de Login -->
            <button class="login-button" type="submit">LOGIN</button>
        </form>
        
        

        <!-- Esqueceu a senha -->
        <a href="#" class="forgot-password">Esqueceu a senha?</a>
    </div>
</body>
</html>
