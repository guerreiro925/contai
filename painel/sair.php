<?php 
session_start(); 
unset($_SESSION['login']); // Deleta uma variável da sessão
session_destroy(); // Destrói toda sessão
header("location: login.php");
?>