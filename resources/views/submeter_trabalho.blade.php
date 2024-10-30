<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submeter Trabalho</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajuste de corpo centralizado com distância da menu bar */
        body {
            background-color: #001f3f;
            background-size: 8px 8px;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-left: 250px; /* Compensa a largura da menu bar */
        }

        /* Menu lateral */
        .menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #007bff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1000;
        }

        .menu h3 {
            color: #ffffff;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .menu ul li {
            margin: 15px 0;
        }

        .menu ul li a,
        .menu ul li button {
            text-decoration: none;
            color: #ffffff;
            font-size: 18px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            display: block;
            text-align: left;
            transition: background-color 0.3s;
        }

        .menu ul li a:hover,
        .menu ul li button:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }

        /* Botão de desconectar no final do menu */
        .menu .logout-btn {
            margin-top: auto;
            width: 100%;
        }

        /* Container centralizado */
        .container {
            max-width: 600px;
            background-color: #f9f9f9;
            color: #2d3748;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: auto; /* Centraliza ao lado da menu bar */
        }

        h1 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 20px;
        }

        /* Botão desconectar posicionado no final do menu lateral */
        .sidebar .logout-btn {
            margin-top: auto;
            margin-bottom: 20px;
            width: 80%;
            background: #ff4d4d00;
        }

        
    </style>
</head>
<body>
    <!-- Menu lateral -->
    <div class="menu">
        <h3>Menu</h3>
        <ul>
            <li><a href="{{ route('bemvindo') }}">Página Inicial</a></li>
            <li><a href="#">Trabalhos Submetidos</a></li>
            <li><a href="{{ route('perfil') }}">Perfil</a></li>
            <li class="logout-btn">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Desconectar</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Conteúdo centralizado -->
    <div class="container">
        <h1>Submeter Trabalho</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="responsaveis">Responsáveis</label>
                <input type="text" class="form-control" id="responsaveis" name="responsaveis" required>
            </div>
            <div class="form-group">
                <label for="curso">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Trabalho</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Selecione o tipo</option>
                    <option value="oral">Oral</option>
                    <option value="escrito">Escrito</option>
                    <option value="banner">Banner</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">Título do Trabalho</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submeter</button>
        </form>
    </div>
</body>
</html>
