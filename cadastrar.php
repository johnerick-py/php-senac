<?php
session_start();
include('conexao.php');

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);

$consulta = "SELECT * FROM login WHERE usuario = '{$usuario}'";
$resultado = mysqli_query($conexao, $consulta);
$numero_linha = mysqli_num_rows($resultado);

if($nome == ""){
    $_SESSION["usuario_nao_informado"] = true;
    header('Location: cadastro.php');
    exit();
}

if($usuario == ""){
    $_SESSION["usuario_nao_informado"] = true;
    header('Location: cadastro.php');
    exit();
}

if($senha == ""){
    $_SESSION["senha_nao_cadastrada"] = true;
    header('Location: cadastro.php');
    exit();
}

#Se O usuario ja exite no banco de dados
#Não Realizo o cadastro e Retorna mensagem de erro
#E retorna para a tela de cadastro
if($numero_linha == 1){    
    $_SESSION["usuario_existe"] = true;
    header('Location: cadastro.php');
    exit();
}

    #Se o usuário não existe no banco, Temos que inserir
    $sql = "INSERT INTO login (usuario_id, usuario, senha, nome_completo) 
    VALUES (NULL, '{$usuario}', md5('{$senha}'), '{$nome}')";
    
    if($conexao->query($sql) === TRUE){
        $_SESSION["usuario_cadastrado"] = true;
    }
    $conexao->close();
    header('Location: cadastro.php');
    exit();