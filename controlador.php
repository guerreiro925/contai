<?php

error_reporting(0);
ini_set("display_errors", 0 );

include("conexao.php");

$acao = $_GET['acao'];

if ($acao == 'inserir_conto') {

	$nome = $_POST['nomeAutor'];
	$categoria = $_POST['categoria'];
	$tituloConto = $_POST['titulo_conto'];
	$data = date('Y-m-d');
	$conto = nl2br($_POST['conto']);

	mysql_query("INSERT INTO publiqueai (nomeAutor,idCategoria,titulo,data,conto) VALUES ('$nome','$categoria','$tituloConto','$data','$conto')");
	
		echo "<script type='text/javascript'>
	
		window.location.href = 'publiqueai.php';
		alert('Muito obrigado por ter nos enviado seu conto. Em breve o mesmo podera aparecer em nosso site!');
	
		</script>";
		
	}
	
if ($acao == 'inserir_mensagem') {
		
	$mensagem .= "Nome do Usuário : ".$_POST['nome']." \n";

	$mensagem .= "Email : ".$_POST['email']." \n";

	$mensagem .= "Assunto : ".$_POST['assunto']." \n";

	$mensagem .= "Mensagem do Usuário : ". $_POST['mensagem'];


	mail("lucaskaibara@hotmail.com", "Contato Website", "www.contai.org.br - Todos os direitos reservados", $mensagem);
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'publiqueai.php';
		alert('Muito obrigado pelo seu feedback. Mensagem enviada com sucesso!');
	
		</script>";
		
	}	
	
if ($acao == 'alterar_conto') {
		
	$idConto = $_POST['idConto'];
	$categoria = $_POST['categoria'];
	$conto = $_POST['conto'];
	
	mysql_query("UPDATE publiqueai SET conto = '$conto', idCategoria = '$categoria' WHERE idConto = '$idConto'");
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'contaipainel/novos_contos.php';
		alert('Conto alterado com sucesso!');
	
		</script>";
		
	}
	
if ($acao == 'excluir_conto') {
		
	$idConto = $_GET['idConto'];
	
	mysql_query("DELETE FROM publiqueai WHERE idConto = '$idConto'");
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'contaipainel/novos_contos.php';
		alert('Conto excluido com sucesso!');
	
		</script>";
		
	}
	
if ($acao == 'publicar_conto') {
		
	$idConto = $_GET['idConto'];
	
	mysql_query("UPDATE publiqueai SET publicar = 1 WHERE idConto = '$idConto'");
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'contaipainel/contos_publicados.php';
		alert('Conto publicado com sucesso!');
	
		</script>";
		
	}

?>