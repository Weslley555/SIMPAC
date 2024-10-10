<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #007bff, #00d4ff);
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box;
        }
        .login-container img {
            width: 150px;
            height: auto;
            margin-bottom: 20px;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .login-container input, .login-container button {
            width: calc(100% - 20px);
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-container button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .login-container .forgot-password {
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .login-container .forgot-password:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .login-container {
                padding: 15px;
            }
            .login-container h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://th.bing.com/th/id/OIP.NMGh9O8R4YWNVTjGJHUJqwHaFg?rs=1&pid=ImgDetMain" alt="Portal do Aluno">
        <h1>PORTAL DO ALUNO</h1>
        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <input type="text" name="matricula" placeholder="Coloque sua matrícula" required>
            <input type="password" name="senha" placeholder="Coloque sua senha" required>
            <button type="submit">LOGIN</button>
        </form>
        <a href="#" class="forgot-password">Esqueceu a senha?</a>
    </div>

    <!-- Modal de erro -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Erro de Autenticação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Dados incorretos. Tente novamente.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        @if ($errors->any())
            $(document).ready(function() {
                $('#errorModal').modal('show'); // Exibe o modal quando há erros
            });
        @endif
    </script>
</body>
</html>
