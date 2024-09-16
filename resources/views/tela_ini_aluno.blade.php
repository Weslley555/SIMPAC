<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Aluno</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f1f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        .container {
            text-align: center;
            padding: 20px;
            max-width: 350px;
            background-color: #f9f9f9;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 50px;
            height: auto;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            color: #2d3748;
            margin-bottom: 5px;
        }

        .greeting {
            color: #4a5568;
            font-size: 18px;
            margin-bottom: 10px;
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
            color: #2d3748;
        }

        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #0056b3;
        }

        /* Menu lateral */
        .menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #f9f9f9;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            padding: 20px;
            z-index: 1000;
        }

        .menu.open {
            transform: translateX(0);
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

        .menu-btn-container {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
            z-index: 1001;
        }

        .menu-btn {
            background: none;
            border: none;
            font-size: 24px;
            margin-right: 10px;
        }

        /* Ícone do menu */
        .menu-btn span {
            display: block;
            width: 30px;
            height: 4px;
            background-color: #2d3748;
            margin: 6px 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
                max-width: 100%;
                margin: 0 10px;
            }

            .profile-pic {
                width: 120px;
                height: 120px;
            }

            .logo {
                width: 40px;
            }

            .welcome-message {
                font-size: 24px;
            }

            .greeting {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
                max-width: 100%;
                margin: 0 5px;
            }

            h1 {
                font-size: 20px;
            }

            .profile-pic {
                width: 100px;
                height: 100px;
            }

            .welcome-message {
                font-size: 20px;
            }

            .logout-btn {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="menu-btn-container">
        <button class="menu-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <span>Menu</span>
    </div>

    <div class="menu" id="sideMenu">
        <h3> <br> </h3> 
        <ul>
            <li><a href="#">Página Inicial</a></li>
            <li><a href="#">Trabalhos Avaliados</a></li>
            <li><a href="#">Trabalhos Submetidos</a></li>
            <li><a href="#">Perfil</a></li>
            <li>
                <!-- Formulário para logout no menu -->
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #007bff; font-size: 18px; cursor: pointer;">Desconectar</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="container">
        <img class="logo" src="https://th.bing.com/th/id/R.4ad702d6515c56ec4995268a8479a04c?rik=pF8Mj1GVzgvQ4w&pid=ImgRaw&r=0" alt="Logo Univicosa">
        <p class="greeting">Olá, Tudo bem?</p>
        <h1 class="welcome-message">Seja bem-vindo<br>Pedro</h1>
        <img class="profile-pic" src="https://via.placeholder.com/150" alt="Foto de Perfil">

        <!-- Formulário para logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Sair</button>
        </form>
    </div>

    <script>
        const menuBtnContainer = document.querySelector('.menu-btn-container');
        const sideMenu = document.getElementById('sideMenu');

        menuBtnContainer.addEventListener('click', () => {
            sideMenu.classList.toggle('open');
        });
    </script>
</body>
</html>
