<?php
session_start();
include('check_login.php');
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - Senac</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"><!-- Importa Bulma-->
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <script src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script><!-- Importa ícones-->
    <script src="https://kit.fontawesome.com/0fa5400974.js" crossorigin="anonymous"></script><!-- Importa ícones-->
    
    <!--<link rel="stylesheet" href="css/cadastro.css">-->
</head>

<body>
    <!--Menu de navegação  -->
    <nav class="navbar is-spaced has-shadow is-warning" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="dashboard.php">
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
                            <a class="button is-primary" href="logout.php">
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

    <section class="hero is-fullheight is-black">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1 center" style="text-align: center;">Cadastro de Usuário</h1>
                <div class="column">
                    <div class="box" style="background-color: #201f1f;  color: white;">
                        <h3 class="subtitle is-4" style="text-align: left;">Para cadastrar um novo usuário, preencha os campos abaixo!</h3>
                        <?php
                        if (isset($_SESSION["usuario_existe"])) {
                        ?>
                            <div class="notification is-danger">
                                <p>O usuário informado já existe!</p>
                            </div>
                        <?php
                            unset($_SESSION["usuario_existe"]);
                        } else if (isset($_SESSION["usuario_cadastrado"])) {
                        ?>
                            <div class="notification is-success">
                                <p>O usuário foi cadastrado com sucesso!</p>
                            </div>
                            <?php
                            unset($_SESSION["usuario_cadastrado"]);
                            ?>

                        <?php
                        } else if (isset($_SESSION["senha_nao_cadastrada"])) {
                        ?>
                            <div class="notification is-danger">
                                <p>A senha não foi informada. Favor informar!</p>
                            </div>
                            <?php

                            unset($_SESSION["senha_nao_cadastrada"]);
                            ?>
                        <?php
                        } else if (isset($_SESSION["usuario_nao_informado"])) {
                        ?>
                            <div class="notification is-danger">
                                <p>Usuário não informado. Favor informar!</p>
                            </div>
                        <?php
                        }
                        unset($_SESSION["usuario_nao_informado"]);
                        ?>


                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <label>Nome Completo:</label>
                                    <input name="nome" type="text" class="input is-large" placeholder="Informe o nome completo" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="">Usuario:</label>
                                    <input name="usuario" name="text" class="input is-large" placeholder="Informe o usuário">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label for="">Senha:</label>
                                    <input name="senha" class="input is-large" type="password" placeholder="Informe a senha">
                                </div>
                            </div>
                            <button type="submit" class="button  is-info is-large is-warning is-fullwidth">Cadastrar</button>
                        </form>
                    </div>

                </div>
            </div>

    </section>


    <!--FIM - HTML Bulma -->

</body>

</html>