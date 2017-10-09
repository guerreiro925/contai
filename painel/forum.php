<?php 
error_reporting(0);
include("conexao.php");
@session_start();

if( (!isset($_SESSION['usuario']) == true ) )
{
	unset ($_SESSION['login']);
	header('location:login.php');	
}

	$sessaousuario = $_SESSION ['usuario']; // Ativando esta variável + 'nome' = inicia a visualização do perfil do usuário//
?>

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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="img/icon.png" rel="shortcut icon">
    <title>Contaí | Painel Administrativo </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/css/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
    
    <link href="assets/css/root.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="img/logo.png" style="height:57px" class="img-responsive center-margin"></a>
            </div>

            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <ul class="nav side-menu">
                  <li class="active" ><a href="index.php"><i class="fa fa-home"></i> Início </a></li>
                </ul>
                <ul class="nav side-menu">
                 <?php if($nivel == 'ADMIN'){?><li><a href="categorias.php"><i class="fa fa-tags"></i> Categorias </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="contos.php"><i class="fa fa-leanpub"></i> Contos <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_contos;?></span></a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="usuarios.php"><i class="fa fa-user"></i> Usuários </a></li>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="unidades.php"><i class="fa fa-university"></i> Unidades </span></a></li><?php } ?>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="sobre.php"><i class="fa fa-history"></i> Conheç<span style="font-weight:bold; color:#025287">Aí</span> </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="publiqueai.php"><i class="fa fa-pencil"></i> Publique<span style="font-weight:bold; color:#025287">Aí</span> <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_publiqueai;?></span></a></li>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="forum.php"><i class="fa fa-question"></i> Pergunt<span style="font-weight:bold; color:#025287">Aí</span> </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="sair.php"><i class="fa fa-reply"></i> Sair </a></li>
                </ul>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $sessaousuario;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="sair.php"><i class="fa fa-sign-out pull-right"></i> SAIR</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              
            </div>
            <div class="clearfix"></div>
<div class="container-mail">



<!-- Start Mailbox -->
<div class="mailbox clearfix">

  <!-- Start Mailbox Container -->
  <div class="container-mailbox">


        <!-- Start Chat -->
        <div class="chat col-lg-9 col-md-8 padding-0">

          <!-- Start Title -->
          <div class="title">
            <h1>Forum <small>PerguntAÍ</small></h1>
            <p><b>Tire suas duvidas e divulge os métodos de avaliação que mais lhes convem</b></p>
              
          </div>
          <!-- End Title -->

          <!-- Start Conv -->
          <ul class="conv" style="min-height:500px; max-height:500px; overflow:auto;">
<?php
/// busca dados da sessao atual ///
$usuario = $_SESSION['usuario'];
$select = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
while($query = mysql_fetch_array($select)){ $unidades = $query['idUnidade'];}
//// end da busca ////

//// consulta forum////
$consulta = mysql_query("SELECT * FROM forum");
while($rs = mysql_fetch_array($consulta)){
	$idUsuario = $rs['idUsuario'];
	$consulta2 = mysql_query("SELECT * FROM usuarios WHERE idUsuario = '$idUsuario'");
while($rs2 = mysql_fetch_array($consulta2)){
	$idUnidade = $rs2['idUnidade'];}
//// end consulta ////

?>
            <li>
              <p class="ballon color16"><?php 
			  $consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade = '$idUnidade'");
			  while($rs3 = mysql_fetch_array($consulta3)){
				 if($unidades !== $idUnidade){
				  echo $rs3['nome'];  
			  }
			  }
			  ?>
              </p><br>
              <p class="<?php if($unidades == $idUnidade){ echo "ballon color1 navbar-right";} else{echo"ballon color2";}?>"><?php echo $rs['texto']; ?></p><br>
            <li>
<?php
}
?>

          </ul>
          <!-- End Conv -->

          <div class="write">
              <form class="margin-b-20" action="controlador.php?acao=incluir_forum" method="post">
                <p><textarea class="textarea form-control wysihtml5-textarea" placeholder="PerguntAí, respondAí, interajAí." name="txt" style="height:200px; width:100%;"></textarea></p>

                <input type="submit" value="Enviar" class="btn btn-default">
              </form>
          </div>


        </div>
        <!-- End Chat -->

  </div>
  <!-- End Mailbox Container -->

</div>
<!-- End Mailbox -->


</div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/js/nprogress.js"></script>
    <!-- validator -->
    <script src="assets/js/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
	
<script type="text/javascript" src="assets/js/forum/jquery.min.js"></script>

<script type="text/javascript" src="assets/js/forum/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js"></script>

<script type="text/javascript" src="assets/js/forum/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script>
  /* BOOTSTRAP WYSIHTML5 */
  $('.textarea').wysihtml5();
</script>
  </body>
</html>