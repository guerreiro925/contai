<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
    <link rel="stylesheet" href="assets/css/alert-style.css">
</head>

<body onload="myFunction(2)">
<?php include("publiqueai.php"); ?>
<?php

$nome = $_POST['nome'];
echo $nome;
?>
    <script src="assets/js/alert-script.js"></script>
    <script src="assets/js/index.js"></script>
    <script>
	setTimeout("window.location='publiqueai.php'",500000000);
	document.getElementById('nome').value='';
	</script>

</body>
</html>
