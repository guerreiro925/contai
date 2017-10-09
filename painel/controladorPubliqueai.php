<?php
/*
error_reporting(0);
ini_set("display_errors", 0 );
*/
include("conexao.php");
include("session.php");

$acao = addslashes($_GET['acao']);
	
if ($acao == 'alterar_conto') {
		
	$idConto = addslashes($_POST['idConto']);
	$categoria = addslashes($_POST['categoria']);
	$conto = $_POST['conto'];

	mysql_query("UPDATE publiqueai SET conto = '$conto', idCategoria = '$categoria' WHERE idConto = '$idConto'");

		echo "<script type='text/javascript'>
	
		window.location.href = 'publiqueai.php';
		alert('Conto alterado com sucesso!');
	
		</script>";
		
	}	
	
if ($acao == 'alterar_conto_publicar') {
		
	$idConto = addslashes($_POST['idConto']);
	$categoria = addslashes($_POST['categoria']);
	$conto = addslashes($_POST['conto']);

	mysql_query("UPDATE publiqueai SET conto = '$conto', idCategoria = '$categoria' WHERE idConto = '$idConto'");

		echo "<script type='text/javascript'>
	
		window.location.href = 'controladorPubliqueai.php?acao=conf_publ_conto_publiqueai&idConto=".$idConto."';
	
		</script>";
		
	}
	
if ($acao == 'enviar_feedback') {
	
	$idConto = utf8_decode(strip_tags(trim($_GET['idConto'])));
	$feedback2 = utf8_decode(trim($_POST['feedback']));
	
	$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
	while($dados = mysql_fetch_array($consulta)){
		$nome = utf8_decode(strip_tags(trim($dados['nomeAutor'])));
		$sobrenome = utf8_decode(strip_tags(trim($dados['sobrenomeAutor'])));
		$titulo = utf8_decode(strip_tags(trim($dados['titulo'])));
		$emailAutor = utf8_decode(strip_tags(trim($dados['emailAutor'])));
		
		$unidade = utf8_decode(strip_tags(trim($dados['idUnidade'])));
		
		$consulta2 = mysql_query("SELECT * FROM unidades WHERE idUnidade = '$unidade'");
		while($dados2 = mysql_fetch_array($consulta2)){
			$nomeUnidade = utf8_decode(strip_tags(trim($dados2['nome'])));

			require_once('../PHPMailer/class.phpmailer.php');
			
			$Email = new PHPMailer();
			$Email->SetLanguage("br");
			$Email->IsSMTP(); // Habilita o SMTP 
			$Email->Host = 'smtps.pucpr.br'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
			$Email->Port = '25'; // Porta de envio
			// ativa o envio de e-mails em HTML, se false, desativa.
			$Email->IsHTML(true); 
			// email do remetente da mensagem
			$Email->From = $emailAutor;
			// nome do remetente do email
			$Email->FromName = utf8_decode($emailAutor);
			// Endere�o de destino do emaail, ou seja, pra onde voc� quer que a mensagem do formul�rio v�?	
			$Email->AddReplyTo($emailAutor, $nome);
			$Email->AddAddress($emailAutor); // para quem ser� enviada a mensagem ***********************************************  EMAIL DA PESSOA
			// informando no email, o assunto da mensagem
			$Email->Subject = "Feedback do Conto! - contai.org.br";
			// Define o texto da mensagem (aceita HTML)
			$Email->Body .= "<br /><br /> Caro Sr(a): <b> $nome $sobrenome</b>,<br><br> Segue o feedback referente ao texto <b> $titulo </b> enviado &agrave; plataforma Conta&iacute; : <br /> $feedback2 <br /><br /> www.contai.org.br - Equipe Conta&iacute; - $nomeUnidade";	
			// verifica se est� tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
			if(!$Email->Send()){
				echo "<p>A mensagem não foi enviada. </p>";
				echo "Erro: " . $Email->ErrorInfo;
			}else{
				echo "<script type='text/javascript'> window.location.href = 'publiqueai.php'; alert('Feedback enviado com sucesso!'); </script>";
		
			}

	//////////////////////////////////////////////////////////////////
	}	
				
	}
	
	}
		
if ($acao == 'excluir_conto') {
		
	$idConto = addslashes($_GET['idConto']);
	
	mysql_query("UPDATE publiqueai SET deletar = '1' WHERE idConto = '$idConto'");
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'publiqueai.php';
		alert('Conto exclu\u00eddo com sucesso!');
	
		</script>";
		
	}
	
if ($acao == 'conf_publ_conto_publiqueai') {
		
	$idConto = addslashes($_GET['idConto']);

		echo "<script type='text/javascript'>
				var confirmar = confirm('Voc\u00ea realmente deseja publicar este conto? Se voc\u00ea publicar, n\u00e3o ser\u00e1 mais poss\u00edvel realizar o feedback desse conto. Deseja Prosseguir?');

				if (confirmar){
					window.location = 'controladorPubliqueai.php?acao=publicar_conto_publiqueai&idConto=".$idConto."';
				}
				
				else {
					alert('O conto n\u00e3o foi publicado!');
					window.location = 'alterar_conto.php?idConto=".$idConto."';
				}
			  </script>";
		
	}
	
if ($acao == 'publicar_conto_publiqueai') {
		
	$idConto = addslashes($_GET['idConto']);
	
	$usuario = $_SESSION['usuario'];
	
	$query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
	while($dado = mysql_fetch_array($query)){
	$idUsuario = $dado['idUsuario'];		
				
	$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
	while($dados = mysql_fetch_array($consulta)){
	$idConto = $dados['idConto'];		
	$idUnidade = $dados['idUnidade'];
	$titulo = $dados['titulo'];
	$conto = $dados['conto'];
	$conto2 = strip_tags($conto);
	$conto3 = preg_replace("/(\\r)?\\n/i", "<p>", $conto2);
	$idCategoria = $dados['idCategoria'];
	$nomeautor = $dados['nomeAutor'];
	$sobrenomeautor = $dados['sobrenomeAutor'];
	$idade = $dados['idadeAutor'];
	
	$data = date('Y-m-d');
	
	mysql_query("INSERT INTO contos (idUnidade,titulo,conto,idCategoria,autor,idUsuario,data,idade) VALUES ('$idUnidade','$titulo','$conto3','$idCategoria','$nomeautor' ' $sobrenomeautor','$idUsuario','$data','$idade')");	
			
	}
	
	}
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'controladorPubliqueai.php?acao=email_publicar_conto_publiqueai&idConto=".$idConto."';	
		alert('Conto publicado com sucesso');

		</script>";
		
	}
			
if ($acao == 'email_publicar_conto_publiqueai') {	
	
	$idConto = utf8_decode(strip_tags(trim($_GET['idConto'])));
	
	$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
	while($dados = mysql_fetch_array($consulta)){
	$idConto = utf8_decode(strip_tags(trim($dados['idConto'])));
	$titulo = utf8_decode(strip_tags(trim($dados['titulo'])));
	$nome = utf8_decode(strip_tags(trim($dados['nomeAutor'])));
	$sobrenome = utf8_decode(strip_tags(trim($dados['sobrenomeAutor'])));
	$email = utf8_decode(strip_tags(trim($dados['emailAutor'])));
	
	$unidade = utf8_decode(strip_tags(trim($dados['idUnidade'])));
		
		$consulta2 = mysql_query("SELECT * FROM unidades WHERE idUnidade = '$unidade'");
		while($dados2 = mysql_fetch_array($consulta2)){
			$nomeUnidade = utf8_decode(strip_tags(trim($dados2['nome'])));
			
			require_once('../PHPMailer/class.phpmailer.php');
			
			$Email = new PHPMailer();
			$Email->SetLanguage("br");
			$Email->IsSMTP(); // Habilita o SMTP 
			$Email->Host = 'smtps.pucpr.br'; // Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
			$Email->Port = '25'; // Porta de envio

			// ativa o envio de e-mails em HTML, se false, desativa.
			$Email->IsHTML(true); 
			// email do remetente da mensagem
			$Email->From = $email;
			// nome do remetente do email
			$Email->FromName = utf8_decode($email);
			// Endere�o de destino do emaail, ou seja, pra onde voc� quer que a mensagem do formul�rio v�?	
			$Email->AddReplyTo($email, $nome);
			$Email->AddAddress($email); // para quem ser� enviada a mensagem ***********************************************  EMAIL DA PESSOA
			// informando no email, o assunto da mensagem
			$Email->Subject = "Conto Publicado! - contai.org.br";
			// Define o texto da mensagem (aceita HTML)
			$Email->Body .= "<br /><br />
							 Caro Sr(a): <b> $nome $sobrenome</b>, <br><br> Seu texto <b>$titulo</b> ao qual voc&ecirc; enviou a nossa plataforma foi publicado na data de hoje em nosso site. ConfereA&iacute; <br /><br /> www.contai.org.br - Equipe Conta&iacute; - $nomeUnidade";	
			// verifica se est� tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
			if(!$Email->Send()){
				echo "<p>A mensagem não foi enviada. </p>";
				echo "Erro: " . $Email->ErrorInfo;
			}else{
				echo "<script type='text/javascript'> window.location.href = 'controladorPubliqueai.php?acao=deletar_conto_publiqueai_publ&idConto=".$idConto."';</script>";
		
			}

	//////////////////////////////////////////////////////////////////
	}	
	
	}
		
	}	
	
if ($acao == 'deletar_conto_publiqueai_publ') {
		
	$idConto = addslashes($_GET['idConto']);
	
	mysql_query("UPDATE publiqueai SET deletar = '1' WHERE idConto = '$idConto'");
		
		echo "<script type='text/javascript'>
	
		window.location.href = 'publiqueai.php';
	
		</script>";
		
	}

?>