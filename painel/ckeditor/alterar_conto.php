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
    <title>Contaí | Painel Administrativo</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/css/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" style="overflow-x:hidden;">
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
                  <li><a href="contos.php"><i class="fa fa-leanpub"></i> Contos <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_contos;?></span></a></li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="usuarios.php"><i class="fa fa-user"></i> Usuários </span></a></li>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="unidades.php"><i class="fa fa-university"></i> Unidades </a></li><?php } ?>
                </ul>
                <ul class="nav side-menu">
                  <?php if($nivel == 'ADMIN'){?><li><a href="sobre.php"><i class="fa fa-history"></i> Conheç<span style="font-weight:bold; color:#025287">AÍ</span></a></li><?php }?>
                </ul>
                <ul class="nav side-menu">
                  <li class="active"><a href="publiqueai.php"><i class="fa fa-pencil"></i> Publique<span style="font-weight:bold; color:#025287">AÍ</span> <span class="badge bg-red pull-right" data-toggle="tooltip" data-placement="right" title="Total de dados"><?php echo $l_publiqueai;?></span></a></li>
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
                    <li><a href="javascript:;">AJUD<span style="font-weight:bold; color:#025287">AÍ</span></a></li>
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
                <h4>Editar Publique<span style="font-weight:bold; color:#025287">Aí</span></h4>
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
<?php
$idConto = $_GET['idConto'];
				
$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
while($dados = mysql_fetch_array($consulta)){
$idConto = $dados['idConto'];
?>
                
                <h4><span >Autor do conto: </span>
            	<span style="font-weight:bold;"><?php echo $dados['nomeAutor']; ?> <?php echo $dados['sobrenomeAutor']; ?></span></h4>
                
                	<br />
                
                <h4><span>Título do conto: </span>
            	<span style="font-weight:bold"><?php echo $dados['titulo']; ?></span></h4>
                    
<?php } ?>

<?php
$idConto = $_GET['idConto'];
				
$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
while($dados = mysql_fetch_array($consulta)){
$idConto = $dados['idConto'];
?>

                    <form class="form-horizontal form-label-left" action="controladorPubliqueai.php?acao=alterar_conto" method="post" enctype="multipart/form-data" novalidate>

                      <h4><p>Preencha corretamente os campos para realizar a correção do conto de Nº<?php echo $idConto;?> </p></h4>
                      <span class="section"></span>
					 
                      <div class="">
                        <div class="">
                	<input type="hidden" name="idConto" value="<?php echo $dados['idConto']; ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea type="text" name="conto" id="message1" rows="3"  class="form-control col-md-12 col-xs-12" placeholder="Preencha o campo." required type="text"><?php echo $dados['conto'];?></textarea>
                        </div>
                      </div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('conto');
</script>

					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <select name="categoria" class="form-control col-md-12 col-xs-12" required type="text">
<?php 
$idCategoria = $dados['idCategoria'];
				
$consulta2 = mysql_query("SELECT * FROM categorias WHERE idCategoria = '$idCategoria' AND deletar != '1'");
while($dados2 = mysql_fetch_array($consulta2)){
?>           
							<option value="<?php echo $dados2['idCategoria'] ?>"> <?php echo $dados2['nome'] ?> </option>
<?php } ?>
<?php
$consulta3 = mysql_query("SELECT * FROM categorias WHERE idCategoria != '$idCategoria' AND deletar != '1'");
while($dados3 = mysql_fetch_array($consulta3))
{ ?>

							<option value="<?php echo $dados3['idCategoria'] ?>"> <?php echo $dados3['nome'] ?> </option>
				
<?php } ?>
                    	 </select>

                          
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-4">
                	<button type="button" class="btn btn-primary" onClick="window.location='publiqueai.php'">Voltar a Página Anterior</button>
                	<button type="submit" class="btn btn-primary">SalveAí</button>
                	<button type="submit" class="btn btn-primary" formaction="controladorPubliqueai.php?acao=alterar_conto_publicar">Publicar</button>
                        </div>
                      </div>
                      
                    </form>
<?php } ?>

                      <div class="ln_solid"></div>

<?php
$idConto = $_GET['idConto'];
$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
while($dados = mysql_fetch_array($consulta)){
$idConto = $dados['idConto'];
?>

                    <form class="form-horizontal form-label-left" action="controladorPubliqueai.php?acao=enviar_feedback&idConto=<?php echo $dados['idConto']; ?>" method="post" enctype="multipart/form-data" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-12 col-sm-3 col-xs-12" for=""></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea type="text" name="feedback" id="message1" rows="3"  class="form-control col-md-12 col-xs-12" placeholder="Preencha o campo." required type="text">                      

Ambiente para feedback
                          
<br /><br /><br />     
                          
         <table bgcolor="#337ab7" border = "1" width = "100%" style="border: 1px #337ab7 solid; font-size:14px;">
            <tr>
                <td colspan="2" style="text-align:center; background-color:#fff;"><strong>Legenda de Correção</strong></td>
            </tr>
            <tr>
                <td style="text-transform:uppercase; background-color:#fff;">Palavras Maiúsculas</td>
                <td style="background-color:#fff;">Seu texto possui equívocos ortográficos.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;">Palavra*</td>
                <td style="background-color:#fff;">Palavras precisam ser acentuadas.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;"><strong>Frase ou período</strong></td>
                <td style="background-color:#fff;">Observe se a pontuação está carregada.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;"><span class="marker">Frase ou período</span></td>
                <td style="background-color:#fff;">Texto confuso ou incoerente.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;">Palavras#</td>
                <td style="background-color:#fff;">Veja se faltam conectivos (elementos de ligação textual) adequados.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;"><u>Palavras</u></td>
                <td style="background-color:#fff;">Há equívocos quanto à concordância verbal ou nominal.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;">Palavra //</td>
                <td style="background-color:#fff;">Crie um parágrafo.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;">Palavra (1)...<br />Palavra (2)...<br />Palavra (3)...<br /></td>
                <td style="background-color:#fff;">Repetição de palavras.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;">(Palavra)</td>
                <td style="background-color:#fff;">Palavras precisam ser acentuadas.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;">[? Frases ?]</td>
                <td style="background-color:#fff;">Perguntas sobre a história, uma vez que não se compreende a trajetória da personagem.</td>
            </tr>
            <tr>
                <td style="background-color:#fff;"><s>Palavra</s></td>
                <td style="background-color:#fff;">Palavra desnecessária.</td>
            </tr>
        </table>
                          
                          </textarea>
                        </div>
                      </div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
CKEDITOR.replace('feedback');
</script>
                    
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-5">
                			<button type="submit" class="btn btn-primary">Enviar Feedback</button>
                        </div>
                      </div>

                    </form>
                <?php } ?>
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