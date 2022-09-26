<?php

session_start();
include('conexao.php'); #import

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);


$query_login_form = "SELECT usuario, senha FROM login WHERE usuario = '{$usuario}' AND senha = '{$senha}' ";
$result_query = mysqli_query($conexao, $query_login_form);

$row_len = mysqli_num_rows($result_query);

if($row_len == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: dashboard.php');
    exit();
}else {
    $_SESSION['nao_autenticado'] = $usuario;
    header('Location: index.php');
    exit();
};