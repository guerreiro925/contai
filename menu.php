
<?php include("conexao.php");?>
<div class="navbar-collapse collapse navbar-direita" style="margin-top: 20px;" >
          <ul class="nav navbar-nav" style="background-color:white;">
            <li class="active"><a href="index.php">CONT<span style="font-weight:bold; color:#025287;">AÍ</span></a></li>
            
            
            <li><a href="conhecai.php">CONHEÇ<span style="font-weight:bold; color:#025287;">AÍ</span></a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">LEI<span style="font-weight:bold; color:#025287;">AÍ</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">




<?php
$consulta = mysql_query("SELECT * FROM categorias WHERE deletar != '1' ORDER BY nome ASC ");
while ($dados = mysql_fetch_array($consulta))
{
?>        
<li><a href="categorias.php?idCategoria=<?php echo $dados['idCategoria']; ?>" style="text-transform:uppercase;"><?php echo $dados['nome']; ?></a></li>
<?php } ?>
              </ul>
            </li>
            
            
            <li><a href="publiqueai.php">PUBLIQUE<span style="font-weight:bold; color:#025287;">AÍ</span></a></li>
            
            
            <li><a href="contateai.php">CONTATE<span style="font-weight:bold; color:#025287;">AÍ</span></a></li>
            
          </ul>
        </div> 
        