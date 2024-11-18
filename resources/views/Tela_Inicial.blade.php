<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Estilos do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Estilos personalizados -->
    <style>
        /* Fundo azul com estrelas brilhantes */
        body {
            background-color: #001f3f;
            background-size: 8px 8px; /* Espaçamento maior para menos pontos */
            animation: stars 2s linear infinite;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }
        /* Animação para as estrelas piscantes */
        @keyframes stars {
            from {
                opacity: 0.8;
            }
            to {
                opacity: 1;
            }
        }
        /* Estilo do container central */
        .welcome-container {
            text-align: center;
            color: #ffffff;
        }
        /* Ajuste da imagem do título */
        .title-image {
            width: 300px;
            height: auto;
            margin-bottom: 20px;
        }
        /* Ajuste da imagem no canto inferior direito */
        .corner-image {
            position: fixed;
            bottom: 10px;
            right: 10px;
            width: 100px;
            height: auto;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <!-- Imagem do título -->
        <img src="https://th.bing.com/th/id/OIP.1rOT-C80Rz0Yhx4qtN7YFwHaD5?w=290&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" class="title-image" alt="SIMPAC Logo">
        <p style="font-size: 1.2rem;">Selecione uma das opções abaixo:</p>
        <div class="d-flex flex-column align-items-center">
            <a href="{{ route('login') }}" class="btn btn-primary mb-3" style="width: 220px; font-size: 1.1rem;">Login Aluno</a>
            <a href="{{ route('admin.login') }}" class="btn btn-secondary mb-3" style="width: 220px; font-size: 1.1rem;">Login Administrador</a>
            <a href="{{ route('avaliador.login') }}" class="btn btn-success" style="width: 220px; font-size: 1.1rem;">Login Avaliador</a>
        </div>
        <!-- Imagem no canto inferior direito -->
        <img src="https://th.bing.com/th/id/OIP.ntSuCwN5ueX85bh2J9ubLAHaDz?rs=1&pid=ImgDetMain" class="corner-image" alt="Imagem Canto Inferior Direito">
    </div>
</body>
</html>
