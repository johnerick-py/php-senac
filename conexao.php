<?php

define('HOST', '127.0.0.1');
define('USUAIO', 'root');
define('SENHA','');
define('DB','login');

$conexao = mysqli_connect(HOST, USUAIO, SENHA, DB) or die("Não foi possível se conectar ao banco de dados!");