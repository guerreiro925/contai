<?php 
error_reporting(0);
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
    
    <!-- HELP // CONTAI -->
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
                  <li ><a href="index.php"><i class="fa fa-home"></i> Início </a></li>
                </ul>
                <ul class="nav side-menu">
                 <?php if($nivel == 'ADMIN'){?><li><a href="categorias.php"><i class="fa fa-tags"></i> Categorias </a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li  class="active"><a href="contos.php"><i class="fa fa-leanpub"></i> Contos <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_contos;?></span></a></li>
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
                    <li><a href="javascript:void(0);" onclick="javascript:introJs().start();">AJUDA<span style="font-weight:bold; color:#025287">AÍ</span></a></li>
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
              <div class="title_left">
                <h3>Incluir conto</h3>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content" data-step="1" data-intro="Para incluir basta preencher corretamente os campos abaixo, e clicar em 'CADASTREAÍ' e depois em 'VOLTAR' para visualizar na tabela se foi incluído.." data-position='center'>


                    <form class="form-horizontal form-label-left" action="controlador.php?acao=add_contos" method="post" enctype="multipart/form-data" novalidate>

                      <p>Preencha corretamente os campos para realizar a inclusão </p>
                      <span class="section"><p><?php error_reporting(0); if($_GET['msg'] == 'ok'){echo 'Registro incluído com sucesso.';} else if($_GET['msg'] == 'error'){echo 'Erro ao incluir dados, tente novamente mais tarde.';}?></p>
</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Unidade:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="unidade" id="unidade" class="form-control col-md-7 col-xs-12 required "required type="text">
                          <option value>Selecione uma unidade</option>
<?php
if($nivel == 'ADMIN'){
	$consulta = mysql_query("SELECT * FROM unidades WHERE deletar != 1");
} else {
	$consulta = mysql_query("SELECT * FROM unidades WHERE deletar != 1 AND idUnidade = '$idUnidade_U'");
}
while ($dados = mysql_fetch_array($consulta))
	{
					?>
                        	<option value="<?php echo $dados['idUnidade'];?>"><?php echo $dados['nome'];?></option>
                        <?php } ?>
                        </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Titúlo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="titulo" id="titulo" placeholder="Preencha o titúlo.." required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Categoria:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="categoria" id="categoria" required class="form-control col-md-7 col-xs-12 required">
                          	<option value>Selecione uma categoria</option>
                        <?php
					$consulta = mysql_query("SELECT * FROM categorias WHERE deletar != 1 ORDER by nome ASC");
					while ($dados = mysql_fetch_array($consulta))
					{
					?>
                        	<option value="<?php echo $dados['idCategoria'];?>"><?php echo $dados['nome'];?></option>
                        <?php } ?>
                        	</select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Autor:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="autor" id="autor" placeholder="Preencha o autor.." required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Idade:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="idade" id="idade" placeholder="Preencha a idade.." required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input name="usuario" class="form-control" type="hidden" hidden value="<?php echo $idUsuario_U;?>">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Imagem:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="imagem" id="imagem" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Conto:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea type="text" name="conto" id="conto" rows="12" placeholder="Preencha o conto.." required class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onClick="window.location.href='contos.php'">Voltar</button>
                          <button id="send" type="submit"  class="btn btn-info">CadastreAí</button>
                        </div>
                      </div>
                      
                    </form>
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