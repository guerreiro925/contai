<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php
include("conexao.php");
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$consulta = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha' and deletar != 1");

$numeroLinhas = mysql_num_rows ($consulta); /// Verificação de linhas ///

if ($numeroLinhas <=0){
	echo "<script>alert('Você não foi encontrado');</script>";	
}
else
{
	session_start();
	$_SESSION ['usuario'] = $usuario;

	header("location:index.php");
}


?>

</body>
</html>