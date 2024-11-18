<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submeter Trabalho</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        }

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

        .menu .logout-btn {
            margin-top: auto;
            width: 100%;
        }

        .container {
            max-width: 600px;
            background-color: #f9f9f9;
            color: #2d3748;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
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

    <div class="container">
        <h1>Submeter Trabalho</h1>
        <form action="{{ route('trabalhos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="responsavel_id">Responsável Principal</label>
                <input type="hidden" name="responsavel_id" value="{{ Auth::id() }}">
                <!-- O responsável principal será o usuário logado -->
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
                <label for="modelo_avaliativo">Modelo Avaliativo</label>
                <input type="text" class="form-control" id="modelo_avaliativo" name="modelo_avaliativo" required>
            </div>
        
            <div class="form-group">
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo" required>
            </div>
        
            <div class="form-group">
                <label for="membros">Outros Membros</label>
                <input type="text" class="form-control" id="membros" name="membros[]">
                <div id="outrosMembros"></div>
                <button type="button" class="btn btn-secondary mt-2" id="adicionarMembro">Adicionar Membro</button>
            </div>
        
            <button type="submit" class="btn btn-primary btn-block">Submeter</button>
        </form>
        
        <script>
            document.getElementById('adicionarMembro').addEventListener('click', function() {
                var novoMembro = document.createElement('input');
                novoMembro.type = 'text';
                novoMembro.classList.add('form-control', 'mt-2');
                novoMembro.name = 'membros[]';
                document.getElementById('outrosMembros').appendChild(novoMembro);
            });
        </script>
</body>
</html>
