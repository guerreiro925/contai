<?php

$banco = "ederd710_contai";
$servidor = "localhost";
$usuario = "ederd710_contai";
$senha = "metalica1020";

$conexao = mysql_connect($servidor, $usuario, $senha);
mysql_select_db($banco, $conexao);

?>