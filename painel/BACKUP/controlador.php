<?php
/* CONTROLADOR PHP */
include('conexao.php');
$acao = $_GET['acao'];

//acessar_usuario//
if($acao == 'acessar'){

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);
$senha = md5($senha);
$senha = sha1($senha);
$senha = sha1($senha);
$senha = md5($senha);
$senha = '$P$B/A'.$senha.'.'.rand(1, 9).rand(1, 9).rand(1, 9).'.'.rand(1, 9).rand(1, 9).rand(1, 9).'.'.rand(1, 9).rand(1, 9).rand(1, 9);
$senha = explode('.', $senha);
$senha = $senha[0];



$query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND deletar != 1");
while($rs = mysql_fetch_array($query)){

$senha_banco = $rs['senha'];
$senha_banco_hs = $rs['senha'];
$senha_banco = explode('.', $senha_banco);
$senha_banco = $senha_banco[0];
}




if($senha != $senha_banco OR $senha_banco == NULL){
echo "<script>window.location.href='login.php?msg=error';</script>";
session_destroy();
} else {



$query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha_banco_hs' AND deletar != 1");
while($result = mysql_fetch_array($query)){
session_start();
$_SESSION['usuario'] = $result['usuario'];
echo "<script>window.location.href='index.php';</script>";

}

}
//sair//
} else if($acao == 'sair'){

session_start();
session_destroy();	
echo "<script>window.location.href='../index.php';</script>";
	
} 

//adicionar categoria//
else if($acao == 'add_categoria'){
	
$nome = addslashes($_POST['nome']);
$imagem = $_FILES['imagem'];
$descricao = addslashes($_POST['descricao']);
$cor1 = addslashes($_POST['cor1']);
$cor2 = addslashes($_POST['cor2']);
if (isset($_FILES['imagem']))
{
$pasta_diretorio="img/imagem_categoria/";

if (!file_exists ($pasta_diretorio))
{
	mkdir($pasta_diretorio);
}
$arquivo = $pasta_diretorio.$imagem["name"];
move_uploaded_file($imagem['tmp_name'],$arquivo);


mysql_query ("INSERT INTO categorias ( nome, imagem, descricao, cor, cor_fonte ) VALUES ('$nome', '$arquivo', '$descricao', '$cor1', '$cor2') ");
}
echo "<script>window.location.href='categorias_incluir.php?msg=ok';</script>";
}

//editar categoria//
else if($acao == 'editar_categoria'){
	

$idCategoria = $_POST['id'];
$nome = addslashes($_POST['nome']);
$imagem = $_FILES['imagem'];
$descricao = addslashes($_POST['descricao']);
$cor1 = addslashes($_POST['cor1']); // fundo
$cor2 = addslashes($_POST['cor2']); // fonte
$imagem = $_FILES['imagem'];

	// se for selecionado a imagem nova , atualiza a imagem
	if (file_exists($_FILES['imagem']['tmp_name']))
	{
				if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem["type"])) 
		{ $msg = "Arquivo em formato inválido! A imagem deve ser jpg, jpeg, bmp, gif ou png. Envie outro arquivo"; 
		   echo "<script>location.href='categorias_editar.php?id=$idCategoria'; alert('$msg');</script>";
		}
	else{
	$imagem = $_FILES['imagem'];
		$pasta_dir= "img/"; 
		if (!file_exists($pasta_dir))
		{
			mkdir($pasta_dir);
		}
		$arquivo_imagem = $pasta_dir.$imagem["name"];
		move_uploaded_file($imagem["tmp_name"],$arquivo_imagem);
		
		mysql_query("UPDATE categorias SET nome='$nome', descricao='$descricao', cor='$cor1', cor_fonte = '$cor2', imagem='$arquivo_imagem' WHERE idCategoria = '$idCategoria'");	
	}}
	
	// se não selecionar a imagem atualiza os demais dados.
	else {

	mysql_query("UPDATE categorias SET nome='$nome', descricao='$descricao', cor='$cor1', cor_fonte = '$cor2' WHERE idCategoria = '$idCategoria'");	
	}
	

echo "<script>window.location.href='categorias_editar.php?id=$idCategoria&msg=ok';</script>";

	
} 

//excluir categoria//
else if($acao == 'excluir_categoria'){
	
$idcategoria = $_GET['id'];
mysql_query ("UPDATE categorias SET deletar = '1' WHERE idCategoria = '$idcategoria'");

echo "<script>window.location.href='categorias.php';</script>";


// --------------------------------------------------------------- USUÁRIOS ---------------------------------------------------------------//

} else if($acao == 'add_usuarios'){
	
	$usuario = addslashes($_POST['usuario']);
	$senha = addslashes($_POST['senha']);
	$email = addslashes( $_POST['email']);
	$idUnidade = addslashes( $_POST['unidade']);
	$nivel = addslashes( $_POST['nivel']);


	$senha = md5($senha);
$senha = sha1($senha);
$senha = sha1($senha);
$senha = md5($senha);
$senha = '$P$B/A'.$senha.'.'.rand(1, 9).rand(1, 9).rand(1, 9).'.'.rand(1, 9).rand(1, 9).rand(1, 9).'.'.rand(1, 9).rand(1, 9).rand(1, 9);




$seleciona = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");

if(mysql_num_rows($seleciona) == 0){

mysql_query("INSERT INTO usuarios ( usuario, senha, email, idUnidade, nivel ) VALUES ('$usuario', '$senha', '$email', '$idUnidade', '$nivel') ");	

}

echo "<script>window.location.href='usuarios_incluir.php?msg=ok';</script>";


} else if($acao == 'editar_usuarios'){
	
	$idusuario = $_POST['id'];
	$usuario = addslashes($_POST['usuario']);
	$senha = addslashes($_POST['senha']);

$senha = md5($senha);
$senha = sha1($senha);
$senha = sha1($senha);
$senha = md5($senha);
$senha = '$P$B/A'.$senha.'.'.rand(1, 9).rand(1, 9).rand(1, 9).'.'.rand(1, 9).rand(1, 9).rand(1, 9).'.'.rand(1, 9).rand(1, 9).rand(1, 9);






	$email = addslashes( $_POST['email']);
	$idUnidade = addslashes( $_POST['unidade']);
	$nivel = addslashes( $_POST['nivel']);
	
mysql_query("UPDATE usuarios SET usuario='$usuario', senha='$senha', email='$email', idUnidade='$idUnidade', nivel='$nivel' WHERE idUsuario = '$idusuario'");

echo "<script>window.location.href='usuarios_editar.php?id=$idusuario&msg=ok';</script>";


} else if ($acao == 'excluir_usuarios'){
	
	$idusuario = $_GET['id'];
mysql_query("UPDATE usuarios SET deletar = '1' WHERE idUsuario = '$idusuario'");	

echo "<script>window.location.href='usuarios.php';</script>";


// --------------------------------------------------------------- UNIDADE ---------------------------------------------------------------//
} else if ($acao == 'add_unidades'){
	
	$nome = addslashes( $_POST['nome']);
	
	mysql_query("INSERT INTO unidades ( nome ) VALUES ('$nome') ");	

echo "<script>window.location.href='unidades_incluir.php?msg=ok';</script>";


} else if ($acao == 'editar_unidades'){
	
	$idunidade = $_POST['id'];
	$nome = addslashes( $_POST['nome']);
	
	mysql_query("UPDATE unidades SET nome='$nome' WHERE idUnidade = '$idunidade' ");
	
echo "<script>window.location.href='unidades_editar.php?id=$idunidade&msg=ok';</script>";
	
	
} else if ($acao == 'excluir_unidades'){
	
	$idunidade = $_GET['id'];
	
	mysql_query("UPDATE unidades SET deletar = '1' WHERE idUnidade = '$idunidade'");
	
echo "<script>window.location.href='unidades.php';</script>";


}

// --------------------------------------------------------------- CONTOS ---------------------------------------------------------------//
 else if($acao == 'add_contos'){
		
	$unidade = addslashes ($_POST['unidade']);
	$titulo = addslashes ($_POST['titulo']);
	$conto = addslashes ($_POST['conto']);
	$categoria = addslashes ($_POST['categoria']);
	$autor = addslashes ($_POST['autor']);
	$usuario = addslashes ($_POST['usuario']);
	$imagem = $_FILES['imagem'];
	$data = date('Y-m-d');
	$conto = preg_replace("/(\\r)?\\n/i", "<p>", $conto);


if (isset($_FILES['imagem']))
{
$pasta_diretorio="img/imagem_conto/";

if (!file_exists ($pasta_diretorio))
{
	mkdir($pasta_diretorio);
}
$arquivo = $pasta_diretorio.$imagem["name"];
move_uploaded_file($imagem['tmp_name'],$arquivo);


mysql_query("INSERT INTO contos ( idUnidade, imagem, titulo, conto, idCategoria, autor, idUsuario, data ) VALUES ('$unidade', '$arquivo', '$titulo', '$conto', '$categoria', '$autor', '$usuario','$data') ");	

}
echo "<script>window.location.href='contos_incluir.php?msg=ok';</script>";








		
} else if ($acao == 'editar_contos'){

	$idconto = $_POST['id'];
	$unidade = addslashes ($_POST['unidade']);
	$titulo = addslashes ($_POST['titulo']);
	$conto = addslashes ($_POST['conto']);
	$categoria = addslashes ($_POST['categoria']);
	$autor = addslashes ($_POST['autor']);
	$usuario = addslashes ($_POST['usuario']);
	$data = addslashes ($_POST['data']);
	$imagem = $_FILES['imagem'];


	// se for selecionado a imagem nova , atualiza a imagem
	if (file_exists($_FILES['imagem']['tmp_name']))
	{
				if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem["type"])) 
		{ $msg = "Arquivo em formato inválido! A imagem deve ser jpg, jpeg, bmp, gif ou png. Envie outro arquivo"; 
		   echo "<script>location.href='categorias_editar.php?id=$idCategoria'; alert('$msg');</script>";
		}
	else{
	$imagem = $_FILES['imagem'];
		$pasta_dir= "img/"; 
		if (!file_exists($pasta_dir))
		{
			mkdir($pasta_dir);
		}
		$arquivo_imagem = $pasta_dir.$imagem["name"];
		move_uploaded_file($imagem["tmp_name"],$arquivo_imagem);
		
mysql_query("UPDATE contos SET idUnidade='$unidade', titulo='$titulo', conto='$conto', idCategoria='$categoria', autor='$autor', idUsuario='$usuario', data='$data', imagem='$arquivo_imagem' WHERE idConto = '$idconto' ");
	}}
	
	// se não selecionar a imagem atualiza os demais dados.
	else {

mysql_query("UPDATE contos SET idUnidade='$unidade', titulo='$titulo', conto='$conto', idCategoria='$categoria', autor='$autor', idUsuario='$usuario', data='$data' WHERE idConto = '$idconto' ");
	}
	

echo "<script>window.location.href='contos_editar.php?id=$idconto&msg=ok';</script>";


	







} else if ($acao == 'excluir_contos'){

	$idconto = $_GET['id'];	
	
	mysql_query("UPDATE contos SET deletar = '1' WHERE idConto = '$idconto'");
	
echo "<script>window.location.href='contos.php';</script>";
}

// --------------------------------------------------------------- SOBRE ---------------------------------------------------------------//
else if($acao == 'add_sobre'){
	
$sobre = addslashes($_POST['sobre']);


$sobre = preg_replace("/(\\r)?\\n/i", "<p>", $sobre);

mysql_query ("INSERT into sobre ( sobre) VALUES ('$sobre') ");
echo "<script>window.location.href='sobre_incluir.php?msg=ok';</script>";
	
} 
else if ($acao == 'editar_sobre'){
	
	$idSobre = $_POST['id'];
	$sobre = addslashes( $_POST['sobre']);
	$sobre = preg_replace("/(\\r)?\\n/i", "<p>", $sobre);
	mysql_query("UPDATE sobre SET sobre='$sobre' WHERE idSobre = '$idSobre' ");
	
echo "<script>window.location.href='sobre_editar.php?id=$idSobre&msg=ok';</script>";
	
}
else if ($acao == 'excluir_sobre'){
	
	$id = $_GET['id'];
	
	mysql_query("UPDATE sobre SET deletar = '1' WHERE idSobre = '$id'");
	
echo "<script>window.location.href='sobre.php';</script>";


}

?>