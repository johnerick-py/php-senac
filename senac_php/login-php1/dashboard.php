<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"><!-- Importa Bulma-->
    <script src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script><!-- Importa ícones-->
    <script src="https://kit.fontawesome.com/0fa5400974.js" crossorigin="anonymous"></script><!-- Importa ícones-->
    <link rel="stylesheet" href="css/painel.css">

</head>

<body>

    <?php
    session_start();
    include('check_login.php');
    $usuario = $_SESSION['usuario'];
    ?>

    <!--Menu de navegação  -->
    <nav class="navbar is-spaced has-shadow is-warning" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="painel.php">
                <img src="img/logo-senac_transparente.fw.png">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>


        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">


                <a class="navbar-item" href="dashboard.php">
                    Painel
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="cadastro.php">
                        Cadastro
                    </a>

                    <div class="navbar-dropdown">

                        <a class="navbar-item" href="cadastro.php">
                            Cadastrar Usuário
                        </a>

                        <hr class="navbar-divider">
                        <a class="navbar-item" href="listar.php">
                            Listar Usuários
                        </a>
                    </div>
                </div>

            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <p> Seja bem vindo(a) <?php echo $usuario ?> &nbsp;&nbsp; </p>
                    <div class="field is-grouped">
                        <p class="control">
                            <a class="button is-danger" href="logout.php">
                                <span class="icon">
                                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                                </span>
                                <span>Sair</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <!--Fim - Menu de  Navegação  -->

    <!--HTML Bulma -->

    <section class="hero is-fullheight is-black" >
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-6 is-offset-3">
                    <img style="width: 500px;" src="https://portaltemposmodernos.com.br/wp-content/uploads/2018/05/senac-cursos-1.png" alt="Logo">
                    <br>
                    <br>
                    <div class="box" style="background-color: #201f1f;  color: white;">
                        <h1 class="title is-2 center" style="text-align: center;">Sistema de Login</h1>

                        <a class="button is-info is-large is-warning" href="cadastro.php">
                            <span class="icon">
                                <i class="fa-solid fa-user-plus"></i>
                            </span>
                            <span>Cadastrar Usuário</span>
                        </a>
                        <br><br>
                        <a class="button is-info is-large is-warning" href="listar.php">
                            <span class="icon">
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <span>Listar Usuário</span>
                        </a>                     
                        <br><br>
                        <a class="button is-info is-large is-warning" href="logout.php">
                            <span class="icon">
                                <i class="fa-solid fa-person-walking-arrow-right"></i>
                            </span>
                            <span>Sair</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--FIM - HTML Bulma -->

</body>

</html>