<?php include("conexao.php");?>
<?php 
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];
if($usuario == NULL){
} else {
$query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
while($result = mysql_fetch_array($query)){
$idUnidade_U = $result['idUnidade'];
$idUsuario_U = $result['idUsuario'];
$nivel = $result['nivel']; // COMUM/ADMIN
}
}
?>


<div class="navbar-collapse collapse navbar-right" style="margin-top:20px;">
          <ul class="nav navbar-nav" style="background-color:white;">
    
			 <li><a href="index.php">INÍCIO</a></li>

 			<?php if($nivel == 'ADMIN'){?><li><a href="categorias.php">CATEGORIAS</a></li><?php } ?>

             <li><a href="contos.php">CONTOS</a></li>
             
             <li><a href="usuarios.php">USUÁRIOS</a></li>
             
      <?php if($nivel == 'ADMIN'){?><li><a href="unidades.php">UNIDADES</a></li><?php } ?>
             
      <?php if($nivel == 'ADMIN'){?> <li><a href="sobre.php">CONHEÇ<span style="font-weight:bold; color:#025287;">AÍ</span></a></li><?php } ?>


             <li><a href="publiqueai.php">PUBLIQUE<span style="font-weight:bold; color:#025287;">AÍ</span></a></li>
            
            
             <li><a href="controlador.php?acao=sair">SAIR</a></li>
            
          </ul>
        </div> 