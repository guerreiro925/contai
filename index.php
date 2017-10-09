<?php
include("painel/conexao.php");
	
	$consulta = mysql_query("SELECT * FROM contador WHERE idContador = '1'");
	$dados = (mysql_fetch_array($consulta));
		$numero = $dados['numero'];
	
	$numero_visitantes = $numero + 1;
	$visutantes_total = mysql_query("UPDATE contador SET numero = '$numero_visitantes' WHERE numero = '$numero'");
	
?>

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
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/carousel.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/my-slider.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/js/ism-2.1.js"></script>
    <script src="assets/js/modernizr.js"></script>

 
  <link href="assets/css/animate.min.css" rel="stylesheet"> <!-- SLIDE -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link id="css-preset" href="assets/css/preset1.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">

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

  <body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->



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
          <a class="navbar-brand" href="index.php" style="margin-left:0 auto;5"><img src="assets/img/logo.jpg" width="160px"></a>
          
          
        </div>

		<?php include("menu.php");?>

      </div>
    </div>

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div id="headerwrap" style="border-top:3px solid #fff;">

    
    
    
    
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->



  <header id="home">

  	<br><br>
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active img-1" >
<?php
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '15' AND deletar != 1  ORDER BY idConto DESC LIMIT 1 ");
while ($dados2 = mysql_fetch_array($consulta2))
{
	$idUnidade = $dados2['idUnidade'];
	$idCategoria = $dados2['idCategoria'];
	$idConto = $dados2['idConto'];
	$consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade='$idUnidade' AND deletar != 1");
while ($dados3 = mysql_fetch_array($consulta3)){
	$unidade = $dados3['nome'];
}
?>	
          <div class="caption">
            <h1 class="animated-1 fadeInLeftBig" style="background-color: #b07d22;"><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['titulo'];?></a></h1>
            <p class="animated-2 fadeInRightBig" style="color: #b07d22; border-color: #b07d22"><b><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['autor'];?></b>, <?php echo $unidade;?></a></p>
          </div>
        
<?php } ?></div>
        <div class="item img-2">
<?php
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '16' AND deletar != 1  ORDER BY idConto DESC LIMIT 1 ");
while ($dados2 = mysql_fetch_array($consulta2))
{
	$idUnidade = $dados2['idUnidade'];
	$idCategoria = $dados2['idCategoria'];
	$idConto = $dados2['idConto'];
	$consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade='$idUnidade' AND deletar != 1");
while ($dados3 = mysql_fetch_array($consulta3)){
	$unidade = $dados3['nome'];
}
?>	
          <div class="caption">
            <h1 class="animated-1 fadeInLeftBig" style="background-color:rgb(0, 156, 229)"><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['titulo'];?></a></h1>
            <p class="animated-2 fadeInRightBig" style="color: rgb(0, 156, 229); border-color: rgb(0, 156, 229)"><b><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['autor'];?>, </b> <?php echo $unidade;?></a></p>
          </div>
        
<?php } ?></div>
        <div class="item img-3">
<?php
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '17' AND deletar != 1  ORDER BY idConto DESC LIMIT 1 ");
while ($dados2 = mysql_fetch_array($consulta2))
{
	$idUnidade = $dados2['idUnidade'];
	$idCategoria = $dados2['idCategoria'];
	$idConto = $dados2['idConto'];
	$consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade='$idUnidade' AND deletar != 1");
while ($dados3 = mysql_fetch_array($consulta3)){
	$unidade = $dados3['nome'];
}
?>	
          <div class="caption">
            <h1 class="animated-1 fadeInLeftBig" style="background-color: rgb(174, 125, 32)"><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['titulo'];?></a></h1>
            <p class="animated-2 fadeInRightBig" style="color: rgb(174, 125, 32); border-color:rgb(174, 125, 32)"><b><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['autor'];?></b>, <?php echo $unidade;?></a></p>
          </div>
<?php } ?>
        </div>
        <div class="item img-4">
<?php
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '14' AND deletar != 1  ORDER BY idConto DESC LIMIT 1 ");
while ($dados2 = mysql_fetch_array($consulta2))
{
	$idUnidade = $dados2['idUnidade'];
	$idCategoria = $dados2['idCategoria'];
	$idConto = $dados2['idConto'];
	$consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade='$idUnidade' AND deletar != 1");
while ($dados3 = mysql_fetch_array($consulta3)){
	$unidade = $dados3['nome'];
}
?>	
          <div class="caption">
            <h1 class="animated-1 fadeInLeftBig" style="background-color: rgb(223, 0, 55)"><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['titulo'];?></a></h1>
            <p class="animated-2 fadeInRightBig" style="color: rgb(223, 0, 55); border-color: rgb(223, 0, 55)"><b><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['autor'];?>,</b> <?php echo $unidade;?></a></p>
          </div>
      
<?php } ?></div>
        <div class="item img-5">
<?php
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '183' AND deletar != 1  ORDER BY idConto DESC LIMIT 1 ");
while ($dados2 = mysql_fetch_array($consulta2))
{
	$idUnidade = $dados2['idUnidade'];
	$idCategoria = $dados2['idCategoria'];
	$idConto = $dados2['idConto'];
	$consulta3 = mysql_query("SELECT * FROM unidades WHERE idUnidade='$idUnidade' AND deletar != 1");
while ($dados3 = mysql_fetch_array($consulta3)){
	$unidade = $dados3['nome'];
}
?>	
          <div class="caption">
            <h1 class="animated-1 fadeInLeftBig" style="background-color: rgb(96, 21, 114)"><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['titulo'];?></a></h1>
            <p class="animated-2 fadeInRightBig" style="color: rgb(96, 21, 114); border-color: rgb(96, 21, 114)"><b><a href="categorias.php?idCategoria=<?php echo $idCategoria;?>&idConto=<?php echo $idConto;?>"><?php echo $dados2['autor'];?>,</b> <?php echo $unidade;?></a></p>
          </div>
      
<?php } ?></div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

    </div><!--/#home-slider-->
  	<script src="assets/js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="assets/js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="assets/js/wow.min.js"></script>
  <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
  <script type="text/javascript" src="assets/js/jquery.countTo.js"></script>
  <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>


     </div>

    
<!------------------------------------------------------------ /SLIDE --------------------------------------------------------->
    
    
    
    
	    <div class="container">
        	
			<div class="row">
 			
            
         <div class="col-md-12" style="">



	
<br>
<br>
<br>


            
				<div class="col-lg-10 col-md-offset-2">
                
                 <?php
$consulta = mysql_query("SELECT * FROM categorias WHERE deletar != '1' ORDER BY nome ASC ");
while ($dados = mysql_fetch_array($consulta))
{
?>				
				<a href="categorias.php?idCategoria=<?php echo $dados['idCategoria']; ?>">
                <div class="col-lg-2">
                <img src="<?php echo $dados['imagem']; ?>" width="100%">
                <p style="color:#FFF;"><?php echo $dados['nome']; ?></p>
                <hr/>
                </div>
                </a>
                
               
                
                 	<?php } ?>	

				</div>
                </header>
                
							</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->
    
</div>
 
	<!-- *****************************************************************************************************************
	 PORTFOLIO SECTION
	 ***************************************************************************************************************** -->
     

	 	 <div id="portfoliowrap">
        <h3>Contos mais lidos</h3>
        <div class="portfolio-centered col-lg-offset-1">
            <div class="recentitems portfolio">
				<?php
$consulta = mysql_query("SELECT * FROM categorias WHERE deletar != '1' ORDER BY nome ASC ");
while ($dados = mysql_fetch_array($consulta))
{
	$idCategoria = $dados['idCategoria'];
	$imagem = $dados['imagem'];
?>
				<div class="portfolio-item graphic-design">
<?php
$consulta2 = mysql_query("SELECT * FROM contos WHERE idCategoria = '$idCategoria' AND deletar != 1  ORDER BY visualizacoes DESC LIMIT 1 ");
while ($dados2 = mysql_fetch_array($consulta2))
{
?>                
					<div class="he-wrap tpl6">
					<img src="<?php echo $imagem;?>" alt="">
						<div class="he-view">
							<div class="bg a0" data-animate="fadeIn">
                                <h3 class="a1" data-animate="fadeInDown">Os mais lidos : <?php echo $dados2['titulo']; ?></h3>
                                <a data-rel="prettyPhoto" href="categorias.php?idConto=<?php echo $dados2['idConto']; ?>&idCategoria=<?php echo $idCategoria;?>" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>

                       
                        	</div><!-- he bg -->
						</div><!-- he view -->		
					</div><!-- he wrap -->
                <?php } ?>


				</div><!-- end col-12 -->
                <?php } ?>
            </div><!-- portfolio -->
        </div><!-- portfolio container -->
	 </div><!--/Portfoliowrap -->

	 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
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





	 <?php include('rodape.php') ?>
	 
     



  </body>
</html>
