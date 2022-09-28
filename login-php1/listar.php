<?php
session_start();
include('check_login.php');
include('conexao.php');
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
                <h1 class="title is-1 center" style="text-align: center;">Listar Usuários</h1>
                <div class="column">
                    <div class="box" style="background-color: #201f1f;  color: white;">

                        <?php
                        $consulta = "SELECT * FROM login";
                        $resultado = mysqli_query($conexao, $consulta);

                        ?>

                        <table class="table is-bordered  is-fullwidth" style="background: #201f1f; color: white;" align="center">

                            <tr>
                                <td style="padding-right: 20px;"><strong>ID</strong></td>
                                <td style="padding-right: 20px;"><strong>Nome</strong></td>
                                <td style="padding-right: 20px;"><strong>Usuario</strong></td>
                                <td style="padding-right: 20px;"><strong>Senha</strong></td>
                                <td style="padding-right: 20px;" align="center" colspan="2"><strong>Editar / Excluir</strong></td>
                                
                            </tr>

                            <tbody>
                                <?php
                                while ($linhas = mysqli_fetch_assoc($resultado)) {
                                    $id = $linhas['usuario_id'];
                                    $usuario = $linhas['usuario'];
                                    $senha = $linhas['senha'];
                                    $nome = $linhas['nome_completo'];

                                    echo '<tr>
                                         <td>' . $id . '</td>
                                         <td>' . $nome . '</td>
                                         <td>' . $usuario . '</td>
                                         <td>' . $senha . '</td>
                                         <td align="center"> 
                                         <a class="button is-success" href="editar.php?id='.$id.'">
                                           <span class="icon">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                           </span>
                                         </a>
                                         </td>                                   
                                         <td align="center"> 
                                         <a class="button is-danger" href="excluir.php?id='.$id.'" >
                                           <span class="icon">
                                            <i class="fa-solid fa-trash"></i>
                                           </span>
                                         </a>
                                         </td>
                                         </tr>';
                                }
                                ?>
                            </tbody>

                            <tr>
                                <td style="padding-right: 20px;"><strong>ID</strong></td>
                                <td style="padding-right: 20px;"><strong>Nome</strong></td>
                                <td style="padding-right: 20px;"><strong>Usuario</strong></td>
                                <td style="padding-right: 20px;"><strong>Senha</strong></td>
                                <td style="padding-right: 20px;" align="center" colspan="2"><strong>Editar / Excluir</strong></td>
                                
                            </tr>

                        </table>



                    </div>

                </div>
            </div>

    </section>


    <!--FIM - HTML Bulma -->

</body>

</html>