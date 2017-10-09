<html>
<head>

</head>
<body>
<?php

include("conexao.php");

include("publiqueai.php");
$acao = addslashes($_GET['acao']);

if ($acao == 'inserir_mensagem') {
	
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$assunto = $_POST['assunto'];
	$contato = $_POST['contato'];
	$mensagem2 = $_POST['mensagem'];
	
	$nome_completo = $nome . " " . $sobrenome;
		
	$mensagem3 .= "
Nome do Usuário : ".$nome." ".$sobrenome." <br>
Email : ".$email." <br>
Assunto : ".$assunto." <br>
Número para Contato : ".$contato." <br>
Mensagem : ".$mensagem2." <br><br>

www.contai.org.br - Todos os direitos reservados
";
	
	$destino = "contaiprojeto@gmail.com";
	$assunto = "ContateAí";
	
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$nome_completo." <".$email.">";

	$enviaremail = mail($destino, $assunto, $mensagem3, $headers);

		echo "<script src='assets/js/alert-script.js'></script>
<script src='assets/js/index.js'></script>";

		
	}
?>	
	
	?>
	<script>

	setTimeout("window.location='publiqueai.php'", 5500);

	</script>

<script>

</script>
</body>