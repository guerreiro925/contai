<?php 
include("conexao.php");
session_start();

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
    <title>Contaí | Painel Administratio </title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/css/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">

    <link href="assets/css/introjs.css" rel="stylesheet">
    <script src="assets/js/intro.js"></script>

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
                <a id="menu_toggle"   data-step="2" data-intro="Caso esteja no celular ou tablet clique nessas 3 listras para abrir o menu e vá em Contos. Se estiver no computador, pode ir direto em contos. Logo após que abrir a página clique em AJUDAÍ.." data-position='right'><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $sessaousuario;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
<li><a href="javascript:void(0);" onclick="javascript:introJs().start();">AJUD<span style="font-weight:bold; color:#025287">AÍ</span></a></li>
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

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">




                      <h1 class="text-center responsive-contai"  data-step="1" data-intro="Olá <?php echo $sessaousuario;?> vamos aprender a incluir um novo conto no nosso site e a corrigi-los, clique em continuar" data-position='center'> BEM-VINDO <span style="font-weight:bold; color:#025287">AÍ</span><p><?php
$query = mysql_query("SELECT * FROM unidades WHERE idUnidade = '$idUnidade_U'");
while($result = mysql_fetch_array($query)){
$nome = $result['nome'];
}


echo $nome;

?>  </p></h1>

	 <?php if($nivel == 'ADMIN'){?>

		<br /><br />

				<?php
								
				$consultaContador = mysql_query("SELECT * FROM contador ORDER BY idContador = '1'");
				while($resultado = mysql_fetch_array($consultaContador)){
					
				 ?>
                 
                     <p style="text-align:center;"><strong> Contagem de visitas à página inicial do site: <?php echo $resultado['numero']; ?> visualizações </strong></p>
                 
                 <?php } 
	} ?>

                  </div>
                </div>
              </div>
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
  </body>
</html>