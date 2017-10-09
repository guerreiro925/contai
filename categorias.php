<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/icon.png">

    <title>Contaí | Uma rede dos contos</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/slide.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/carousel.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>
     <style type="text/css">
/* Largura da barra de rolagem */
::-webkit-scrollbar {
    width: 10px;
}

/* Fundo da barra de rolagem */
::-webkit-scrollbar-track-piece {
    background-color: #FFF;
    border-left: 1px solid #CCC
}

/* Cor do indicador de rolagem */
::-webkit-scrollbar-thumb:vertical,
::-webkit-scrollbar-thumb:horizontal {
    background-color: #BAC0C4
}

/* Cor do indicador de rolagem - ao passar o mouse */
::-webkit-scrollbar-thumb:vertical:hover,
::-webkit-scrollbar-thumb:horizontal:hover {
    background-color: #717171
}
</style>
  </head>

  <body style=" overflow-x: hidden;">

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu de navegação</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="index.html">SOLID.</a>-->
          <a class="navbar-brand" href="index.php" style="margin-left:0 auto;5"><img src="assets/img/logo.JPG" width="160px"></a>
          
          
        </div>
       
      <?php include('menu.php'); ?>
        
      </div>
    </div>
<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
		<div id="headerwrap" style="border-top:3px solid #fff; height: 100px; min-height: 200px; ">
	    <div class="container"style=" margin-top:9px;">
        	<br>
			<span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase;">Lei</span><span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase">Aí</span><br>
				
 	</div></div>

 	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->
     
<?php
$idCategoria = (int)$_GET['idCategoria'];



$consulta = mysql_query("SELECT * FROM categorias WHERE idCategoria='$idCategoria'");
while ($dados = mysql_fetch_array($consulta))
{
	$nome = $dados['nome'];
	$cor = $dados['cor'];
	$cor_fonte = $dados['cor_fonte'];
}
?>

	 
        

<div id="portfoliowrap">
<div class="container">
<style>
/* Largura da barra de rolagem */
::-webkit-scrollbar {
    width: 10px;
}

/* Fundo da barra de rolagem */
::-webkit-scrollbar-track-piece {
    background-color: #FFF;
    border-left: 1px solid #CCC
}

/* Cor do indicador de rolagem */
::-webkit-scrollbar-thumb:vertical,
::-webkit-scrollbar-thumb:horizontal {
    background-color: #BAC0C4
}

/* Cor do indicador de rolagem - ao passar o mouse */
::-webkit-scrollbar-thumb:vertical:hover,
::-webkit-scrollbar-thumb:horizontal:hover {
    background-color: #717171
}
</style>

<div class="row">
<div class="col-md-3" class="categorias" style="background-color:<?php echo $cor;?>; border-radius:30px 1px 30px 3px; padding:15px; overflow:auto; max-height:600px;">
<h3 style="color:<?php echo $cor_fonte;?>;"><?php echo $nome;?></h3>

<form action="categorias.php?idCategoria=<?php echo $idCategoria;?>" method="post">
<div class="row">
<div class="col-md-12">
<div class="input-group">
<input type="search" class="form-control" name="pesquisar" value="<?php echo $_POST['pesquisar'];?>" placeholder="Pesquisar um conto" aria-describedby="basic-addon1">
<span class="input-group-addon" id="basic-addon1"  style="background-color:transparent; padding:0; margin:0px; border:0;"><button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i></button></span>
</div>
</div>
</div>


</form>
<br/>

<?php
if($_POST['pesquisar'] == NULL){
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '$idCategoria' AND deletar != 1  ORDER BY titulo ASC");
} else {
$pesquisar = $_POST['pesquisar'];
$consultaUnidade = mysql_query("SELECT * FROM unidades WHERE deletar != 1 AND nome LIKE '%$pesquisar%'");
while($dadosUnidade = mysql_fetch_array($consultaUnidade)){ 
	if(mysql_num_rows($consultaUnidade) == 0){}
	else { $unidade = $dadosUnidade['idUnidade'];}
	}
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '$idCategoria' AND deletar != 1 AND titulo LIKE '%$pesquisar%' OR idCategoria = '$idCategoria' AND autor LIKE '%$pesquisar%' OR idCategoria = '$idCategoria' AND idUnidade = '$unidade' ORDER BY titulo ASC");
}
$i = 0;
while ($dados2 = mysql_fetch_array($consulta2))
{
$i = $i + 1;
?>
<ul style="list-style-type:none; text-align:left;">
<a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $dados2['idConto'];?>"  >
<li style="color:<?php echo $cor_fonte;?>; text-transform:uppercase;">
<?php echo $i;?>. <?php echo $dados2['titulo'];?>
<hr style="margin:0;">
</li>
</a>
</ul>
<?php } ?>
</div>


<div class="col-md-9" style="background-color:#f2f2f2; text-align:justify; border-radius:1px 30px 1px 30px;">
<?php
error_reporting(0);
if($_GET['idConto'] == NULL){
$consulta2 = mysql_query("SELECT *, DATE_FORMAT(data, '%m') AS mes, DATE_FORMAT(data, '%Y') AS ano FROM contos WHERE idCategoria = '$idCategoria' AND deletar != 1  ORDER BY titulo ASC LIMIT 1");
} else {
$idConto = (int)$_GET['idConto'];
$consulta2 = mysql_query("SELECT *, DATE_FORMAT(data, '%m') AS mes, DATE_FORMAT(data, '%Y') AS ano FROM contos WHERE idConto = '$idConto' AND deletar != 1");
}

while ($dados2 = mysql_fetch_array($consulta2)){
$idUnidade = $dados2['idUnidade'];
$idConto = $dados2['idConto'];
$idCategoria = $dados2['idCategoria'];
$visualizacoes = $dados2['visualizacoes'] + 1;
$consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade='$idUnidade' AND deletar != 1");
while ($dados3 = mysql_fetch_array($consulta3)){
	$unidade = $dados3['nome'];
}


$mes = $dados2['mes'];
		switch ($mes) {
        case "01":    $mes = 'Janeiro';     break;
        case "02":    $mes = 'Fevereiro';   break;
        case "03":    $mes = 'Março';       break;
        case "04":    $mes = 'Abril';       break;
        case "05":    $mes = 'Maio';        break;
        case "06":    $mes = 'Junho';       break;
        case "07":    $mes = 'Julho';       break;
        case "08":    $mes = 'Agosto';      break;
        case "09":    $mes = 'Setembro';    break;
        case "10":    $mes = 'Outubro';     break;
        case "11":    $mes = 'Novembro';    break;
        case "12":    $mes = 'Dezembro';    break; 
 }







?>







<br/>
<h3 style="text-transform:uppercase; text-align:center;"><?php echo $dados2['titulo'];?></h3>

<div style=" max-height:400px; overflow:auto; padding:15px;">

<?php 

if($_GET['idConto'] == NULL){
	
} else { mysql_query("UPDATE contos SET visualizacoes = '$visualizacoes' WHERE idConto = '$idConto'"); } ?>


<?php 
if($dados2['imagem'] != 'img/imagem_conto/' & $dados2['imagem'] != NULL){
?>

<center><img src="painel/<?php echo $dados2['imagem'];?>" class="img img-responsive" style="max-height:270px; max-width:100%;"> 
</center>

<?php } ?>




<p style="text-align:justify;"><?php echo $dados2['conto'];?></p>
</div>

<br/>

<div id="footer" style="text-align:right; font-weight:!important; font-size:16px; text-transform: capitalize; font-style:italic;font-family: 'Lato', Calibri, Arial, sans-serif;">
<font style=" text-transform: capitalize; font-weight:bold;"><?php echo $dados2['autor'].',&nbsp;'.$mes.'/'.$dados2['ano'];?><br>
<?php echo $unidade;?></font>
</div>








<div class="fb-like" data-href="http://www.contai.org.br/categorias.php?idConto=<?php echo $idConto;?>&idCategoria=<?php echo $idCategoria;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>


<hr style="border:1px solid <?php echo $cor;?>;">


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<br><br>



<div class="fb-comments" data-href="http://www.contai.org.br/categorias.php?idConto=<?php echo $idConto;?>&idCategoria=<?php echo $idCategoria;?>" data-numposts="5" data-width="100%"></div>









<?php } ?>
</div>

</div>




	 </div><!--/Portfoliowrap -->
	 </div>


	 <?php include('rodape.php') ?>
	 
     
     
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
  	<script src="assets/js/jquery.isotope.min.js"></script>
  	<script src="assets/js/custom.js"></script>
    <script src="assets/js/caroseul.js"></script>


    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
<script>
		$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 1,
			lazyLoad : true,
			autoPlay : true,
			navigation : false,
			navigationText :  false,
			pagination : true,
		});
		});
	</script>
    <script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto:true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			pager:true,
		  });
		});
	</script>

<script src="js/jquery-slider.js"></script>
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/mostslider.js" type="text/javascript"></script>
        <script>
        	$(document).ready(function(){
	        	var slider = $("#slider").mostSlider({
		        	aniMethod: 'auto',
	        	});
        	});
        </script>
  </body>
</html>
