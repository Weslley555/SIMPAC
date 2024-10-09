<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submeter Trabalho</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f1f5;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #f9f9f9;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #f9f9f9;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            padding: 20px;
        }

        .menu h3 {
            margin-top: 0;
            font-size: 24px;
            color: #2d3748;
            text-align: center;
        }

        .menu ul {
            list-style: none;
            padding: 0;
        }

        .menu ul li {
            margin: 15px 0;
        }

        .menu ul li a {
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
        }

        .menu ul li a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="menu">
        <h3>Menu</h3>
        <ul>
            <li><a href="{{ route('bemvindo') }}">Página Inicial</a></li>
            <li><a href="#">Trabalhos Avaliados</a></li>
            <li><a href="#">Trabalhos Submetidos</a></li>
            <li><a href="{{ route('perfil') }}">Perfil</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #007bff; font-size: 18px; cursor: pointer;">Desconectar</button>
                </form>
            </li>
        </ul>
    </div>

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
