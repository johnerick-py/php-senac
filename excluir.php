<?php 

session_start();
include('conexao.php');
include('check_login.php');


$usuario = $_SESSION['usuario'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM login WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);
    $linhas = mysqli_fetch_assoc($resultado);

    if($usuario == $linhas['usuario']){
        $_SESSION["usuario_nao_excluido"] = $usuario;
        header('Location: listar.php');
        exit;
    }
}


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM login WHERE usuario_id = {$id}";
    $resultado = mysqli_query($conexao, $sql);

    if($resultado){
        header('Location: listar.php');
    }
}




?>