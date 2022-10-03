<?php

session_start();
include('conexao.php');
include('check_login.php');
$usuario = $_SESSION['usuario'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    

    $sql = "SELECT * FROM login WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    $linhas = mysqli_fetch_assoc($resultado);

    if($usuario == $linhas['usuario']){
        
        $_SESSION["usuario_nao_excluido"] = $usuario;
        header('Location: listar.php');
        exit;
    }

    $nome = $linhas['nome_completo'];
    $usuario_edit = $linhas['usuario'];
    $senha = $linhas['senha'];
    
}

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome_completo'];
    $usuario_edit = $_POST['usuario'];
    $senha = $_POST['senha'];
    

    $sql = "UPDATE login SET usuario = '{$usuario_edit}', senha = md5('{$senha}'), nome_completo = '{$nome}' WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);

    header('Location: listar.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar - Senac</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"><!-- Importa Bulma-->
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <script src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script><!-- Importa ícones-->
    <script src="https://kit.fontawesome.com/0fa5400974.js" crossorigin="anonymous"></script><!-- Importa ícones-->

    <!--<link rel="stylesheet" href="css/cadastro.css">-->
</head>

<body>
    <?php

    ?>
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
                    <strong>Painel</strong>
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="cadastro.php">
                        <strong>Cadastro</strong>
                    </a>

                    <div class="navbar-dropdown">

                        <a class="navbar-item" href="cadastro.php">
                            <strong>Cadastrar Usuário</strong>
                        </a>

                        <hr class="navbar-divider">
                        <a class="navbar-item" href="listar.php">
                            <strong>Listar Usuários</strong>
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

    <section class="hero is-fullheight is-black">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1 center" style="text-align: center;">Editar de Usuário</h1>
                <div class="column">
                    <div class="box" style="background-color: #201f1f;  color: white;">

                        <form role="form" method="POST" action="" class="">
                            <div class="field">
                                <div class="control">
                                    <label>Nome Completo:</label>
                                    <input value="<?php echo $nome ?>" name="nome_completo" type="text" class="input is-large">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label for="">Usuario:</label>
                                    <input value="<?php echo $usuario_edit ?>" name="usuario" type="text" class="input is-large">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <label for="">Senha:</label>
                                    <input value="<?php echo $senha ?>" name="senha" class="input is-large" type="text">
                                </div>
                            </div>
                            <button type="submit" name="salvar" class="button  is-info is-large is-warning is-fullwidth">Editar</button>
                        </form>

                    </div>

                </div>
            </div>

    </section>



    <!--FIM - HTML Bulma -->

</body>

</html>