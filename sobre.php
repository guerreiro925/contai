<?php 
include ('gerenciador/conexao.php');
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9" xmlns="http://www.w3.org/1999/xhtml" lang="en-US"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<!--<![endif]-->
<?php   
$consulta = mysql_query("SELECT * FROM configuracoes ");
while($dados = mysql_fetch_array($consulta)){
	$titulo_site = $dados['titulo_site'];
	$cor = $dados['cor'];
	$logo_radio = $dados['logo_radio'];
	$logo_centro_social = $dados['logo_centro_social'];
	$rede_facebook = $dados['rede_facebook'];
	$rede_youtube = $dados['rede_youtube'];
	$email = $dados['email'];
	$player = stripslashes($dados['player']);
	$zopim = $dados['zopim'];
}

?>
<style type="text/css">
.sf-menu li:hover > a, .sf-menu li > a:hover, .sf-menu li.current > a {
	color:<?php echo $cor ?> ;
	
}
a{
	color:<?php echo $cor ?> ;
}
.tbutton:hover {
	color: #fff;
	background:<?php echo $cor ?>;
}
.logo_radio{
	margin-right:26px;}
</style>



<head>
     
	<title><?php echo $titulo_site ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
			<!-- Seo Meta -->
		<meta name="description" content="">
    	<meta name="author" content="

Eder Diego de Oliveira 

Analista / Idealizador

Miguel Henrique Senegalha de Souza - Gerente de Projetos e Desenvolvedor de Sistemas  - www.mhsdevelopers.com.br

Gerente / Desenvolvedor

Marcus Vinicius Santana Maziero

Designer / Desenvolvedor

Kelvin Christopher Molinari

Designer / Desenvolvedor

Lucas Yoshiyuki Kaibara

Desenvolvedor

Matheus Henrique Lima Vilar

Desenvolvedor

    ">
   		 <meta name="keyword" content="#">

	<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style.css" 	id="dark" media="screen" />
		<link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="styles/icons/icons.css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
		<link rel="icon" href="gerenciador/<?php echo $logo_radio ?>" />
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" type="text/css" href="styles/icons/font-awesome-ie7.min.css" />
	<![endif]-->
</head>
<body id="fluidGridSystem">
	<div id="layout" class="full">

		<header id="header" class="glue">
			<div class="row clearfix">
				<div class="little-head">
					<div class="social social-head">
						<a href="<?php echo $rede_youtube ?>" class="bottomtip" title="Siga-nos no Youtube" target="_blank"><i class="icon-youtube"></i></a>
						<a href="<?php echo $rede_facebook ?>" class="bottomtip" title="Curta-nos no Facebook" target="_blank"><i class="icon-facebook"></i></a>

					</div><!-- end social -->

					<div class="search">
						<form action="pesquisar.php" id="search" method="post">
							<input id="inputhead" name="pesquisar" type="text" onfocus="if (this.value=='Procurar na Rádio...') this.value = '';" onblur="if (this.value=='') this.value = 'Procurar na Rádio...';" value="Procurar na Rádio..." placeholder="Procurar na Rádio ...">
							<button type="submit" name="btnbusca"><i class="icon-search"></i></button>
						</form><!-- end form -->
					</div><!-- search -->
				</div><!-- little head -->
			</div><!-- row -->

			<div class="headdown">
				<div class="row clearfix">
					<div class="logo bottomtip" title="A melhor webrádio da internet">
						<a href="index.php"><img style="" src="gerenciador/<?php echo $logo_radio ?>" alt="A melhor webrádio da internet"width="60%" class="logo_radio"></a>
					</div><!-- end logo -->
					
					<nav>
						<ul class="sf-menu">
							<li class="selectedLava"><a href="index.php">Home<span>comece aqui</span></a>
							</li>


							<li class=" selectedLava"><a href="locutores.php">Locutores<span class="sub">conheça-os</span></a>
							</li>

							<li class="selectedLava"><a href="noticias.php">Notícias<span class="sub">fique atualizado</span></a>
							</li>

							<li class=" selectedLava"><a href="podcasts.php">Podcasts<span class="sub">áudios gravados</span></a>
							</li>

							<li class=" selectedLava"><a href="fotos.php">Fotos<span class="sub">nossa galeria</span></a>
							</li>

							<li class=" selectedLava"><a href="videos.php">Vídeos<span class="sub">vídeos na mídia</span></a>
							</li>

							<li class="current selectedLava"><a href="sobre.php">Sobre a Rádio<span class="sub">sobre a gente</span></a>
							</li>

							<li class=" selectedLava"><a href="contato.php">Contato<span class="sub">fale conosco</span></a>
							</li>

						</ul><!-- end menu -->
					</nav><!-- end nav -->
				</div><!-- row -->
			</div><!-- headdown -->
		</header><!-- end header -->
		<div class="under_header">
		
		</div><!-- under header -->

		<?php

			$consulta = mysql_query("SELECT * FROM sobre");
			while($dados = mysql_fetch_array($consulta)){

		?>

		<div class="page-content back_to_up">
			<div class="row clearfix mb">
				<div class="breadcrumbIn">
					<ul>
						<li><a href="index.html" class="toptip" original-title="Homepage"> <i class="icon-home"></i> </a></li>
						<li> Sobre </li>
					</ul>
				</div><!-- breadcrumb -->
			</div><!-- row -->

			<div class="row row-fluid clearfix mbf">
				<div class="posts">
                <div class="span8">
					<div class="def-block">
						<h4> Sobre </h4><span class="liner"></span>
                        
						
                        
						<div style="text-indent:20px; text-align:justify;">

							<p><?php echo $dados['sobre']; ?></p>


<div class="row">
<div class="col-md-12">

	<span class="texto-centro"><b>Sobre – Desenvolvedores</b></span>
	<br/><br/>
<a href="#" data-toggle="modal" data-target="#myModal"><img class="img-responsive img-polaroid img-radiomar" src="gerenciador/img/ponks.png" width="120px">


</a>
</div>
</div>

						</div>

					</div><!-- def block -->
                    
                    </div>
                    
                    <div class="span4">
					<div class="def-block widget">
						<h4> Player </h4><span class="liner"></span>
						<div class="widget-content">

							<?php echo $player; ?>

						</div><!-- widget content -->
					</div><!-- def block widget NewsLetters -->
				</div><!-- span4 sidebar -->

				</div><!-- posts -->
                

			</div><!-- row clearfix -->
        
		</div><!-- end page content -->
        


		<?php } ?>

		<footer id="footer">
			<div class="footer-last">
				<div class="row clearfix">
					<span class="copyright" style="font-size:11px;">@ 2016 Desenvolvido por <a href="http://www.ponks.com.br/" style="font-size:10px;">Ponks Software Development.</a>
					
					CEM Ir. Acácio.</span>
					<div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->
					<div class="foot-menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="locutores.php">Locutores</a></li>
							<li><a href="noticias.php">Notícias</a></li>
							<li><a href="podcasts.php">Podcasts</a></li>
							<li><a href="fotos.php">Fotos</a></li>
							<li><a href="videos.php">Vídeos</a></li>
							<li><a href="sobre.php">Sobre a Rádio</a></li>
							<li><a href="contato.php">Contato</a></li>
						</ul><!-- end links -->
					</div><!-- end foot menu -->
				</div><!-- row -->
			</div><!-- end last -->

		</footer><!-- end footer -->

	</div><!-- end layout -->
    
    
    
    
    <!-- Scripts -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/theme20.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js"></script>	
	<script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>

	<div class="modal fade" style=" display: block; padding-right: 0px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title text-center" style="color: #000; font-weight:bold" id="myModalLabel">Radiomar - Desenvolvedores</h4>
      </div>
      <div class="modal-body">
   

<div class="row" style="width: 87%">
<div class="col-md-12">
<div class="col-md-4" style="text-align:center;">
<a href="http://lattes.cnpq.br/7618588075513240" target="blank">
<center><img src="integrantes/eder.png" class="img img-responsive" alt="Eder Diego de Oliveira" title="Eder Diego de Oliveira" style="width:50%;"></center>
<p style="font-size:13px; margin-bottom: 0px; color: #000; font-weight:bold" ><b>Eder Diego de Oliveira</b></p>
<p style="font-size:12px; color: #000">Analista / Idealizador</p>
</div>


<div class="col-md-4" style="text-align:center;">
<a href="http://www.facebook.com/miguel.henrique.12345" target="blank">
<center><img src="integrantes/miguel.png" class="img img-responsive" alt="Miguel Henrique Senegalha de Souza - Gerente de Projetos e Desenvolvedor de Sistemas  - www.mhsdevelopers.com.br"  title="Miguel Henrique Senegalha de Souza - Gerente de Projetos e Desenvolvedor de Sistemas  - www.mhsdevelopers.com.br" style="width:50%;"></center>
<p style="font-size:13px; margin-bottom: 0px; color: #000; font-weight:bold"><b>Miguel Henrique</b></p>
<p style="font-size:12px; color: #000">Gerente / Desenvolvedor</p>
</a>
</div>


<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/santanamaziero" target="blank">
<center><img src="integrantes/marcus.png" class="img img-responsive" alt="Marcus Vinicius Santana Maziero" title="Marcus Vinicius Santana Maziero" style="width:50%;"></center>
<p style="font-size:13px; margin-bottom: 0px; color: #000; font-weight:bold"><b>Marcus Vinicius</b></p>
<p style="font-size:12px; color: #000">Designer / Desenvolvedor</p>
</a>
</div>

</div>
</div>


<div class="row" style="width: 87%">
<div class="col-md-12">
<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/kelvyn.chrystopher" target="blank">
<center><img src="integrantes/kelvyn.png" class="img img-responsive" alt="Kelvin Christopher Molinari" title="Kelvin Christopher Molinari" style="width:50%;"></center>
<p style="font-size:13px; margin-bottom: 0px; color: #000; font-weight:bold"><b>Kelvyn Molinari</b></p>
<p style="font-size:12px; color: #000">Designer / Desenvolvedor</p>
</a>
</div>

<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/lucas.kaibara" target="blank">
<center><img src="integrantes/lucas.png" class="img img-responsive" alt="Lucas Yoshiyuki Kaibara" title="Lucas Yoshiyuki Kaibara" style="width:50%;"></center>
<p style="font-size:13px; margin-bottom: 0px; color: #000; font-weight:bold"><b>Lucas Kaibara</b></p>
<p style="font-size:12px; color: #000">Desenvolvedor</p>
</a>
</div>


<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/matheushenrique.guerreiro" target="blank">
<center><img src="integrantes/vilar.png" class="img img-responsive" alt="Matheus Henrique Lima Vilar" title="Matheus Henrique Lima Vilar" style="width:50%;"></center>
<p style="font-size:13px; margin-bottom: 0px; color: #000; font-weight:bold"><b>Matheus Henrique</b></p>
<p style="font-size:12px; color: #000">Desenvolvedor</p>
</a>
</div>
</div>
</div>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
      </div>
    </div>
  </div>
</div>


    <?php echo $zopim ?>
    


</body>
</html>