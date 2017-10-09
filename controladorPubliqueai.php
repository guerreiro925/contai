﻿<html>
<html>
<head>
    <meta charset="utf-8">

<link rel="stylesheet" href="assets/css/alert-style.css">
</head>
<body onload="myFunction(2)">
<?php

include("conexao.php");

$acao = addslashes($_GET['acao']);

if ($acao == 'inserir_conto') {

	$nome = addslashes($_POST['nomeAutor']);
	$sobrenome = addslashes($_POST['sobrenomeAutor']);
	$idade = addslashes($_POST['idadeAutor']);
	$email = addslashes($_POST['emailAutor']);
	$categoria = addslashes($_POST['categoria']);
	$unidade = addslashes($_POST['unidade']);
	$tituloConto = addslashes($_POST['titulo_conto']);
	$data = date('Y-m-d');
	$conto = preg_replace("/(\\r)?\\n/i", "<p>", $_POST['conto']);



	mysql_query("INSERT INTO publiqueai (nomeAutor,sobrenomeAutor,idadeAutor,idCategoria,titulo,data,conto,emailAutor,idUnidade,deletar) VALUES ('$nome','$sobrenome','$idade','$categoria','$tituloConto','$data','$conto','$email','$unidade',0)");
	
		echo "<script src='assets/js/alert-script.js'></script>
<script src='assets/js/index.js'></script>";
		
}
	
if ($acao == 'inserir_mensagem') {

	////////////////////////////////////////////////////
	$nome = utf8_decode (strip_tags(trim($_POST['nome'])));
	$sobrenome = utf8_decode (strip_tags(trim($_POST['sobrenome'])));
	$email = utf8_decode (strip_tags(trim($_POST['email'])));
	$assunto = utf8_decode (strip_tags(trim($_POST['assunto'])));
	$contato = utf8_decode (strip_tags(trim($_POST['contato'])));
	$mensagem2 = utf8_decode (strip_tags(trim($_POST['mensagem'])));
			
			require_once('PHPMailer/class.phpmailer.php');
			
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
			// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
			$Email->AddReplyTo($email, $nome);
			$Email->AddAddress("contaiprojeto@outlook.com"); // para quem será enviada a mensagem
			// informando no email, o assunto da mensagem
			$Email->Subject = "(Email via ContateAí - contai.org.br)";
			// Define o texto da mensagem (aceita HTML)
			$Email->Body .= "<br /><br />
							 <strong>Nome:</strong> $nome<br /><br />
							 <strong>E-mail:</strong> $email<br /><br />
							 <strong>Telefone:</strong> $contato<br /><br />
							 <strong>Assunto:</strong> $assunto<br /><br />
							 <strong>Mensagem:</strong><br /> $mensagem2";	
			// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
			if(!$Email->Send()){
				echo "<p>A mensagem não foi enviada. </p>";
				echo "Erro: " . $Email->ErrorInfo;
			}else{
				echo "<script src='assets/js/alert-script.js'></script>
<script src='assets/js/index.js'></script>";
		
			}






	
		
	//////////////////////////////////////////////////////////////////
	}	
	
	?>
	<script>

	setTimeout("window.location='publiqueai.php'", 3000);

	</script>
</body>
</html>