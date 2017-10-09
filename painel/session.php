<?php
session_start();
$usuario = $_SESSION['usuario'];
if($usuario == NULL){

echo "<script>window.location.href='login.php?msg=session';</script>";
	
}




?>