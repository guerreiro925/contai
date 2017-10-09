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

  <body>

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
			<span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase;">Conheç</span><span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase">Aí</span><br>
				
 	</div></div>

 	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->
	
	<div class="container" style="background-color:#f2f2f2; border-radius:0px 0px 30px 30px; text-align:justify;">
	

<?php
$consulta = mysql_query("SELECT * FROM sobre WHERE deletar != '1'");
while ($dados = mysql_fetch_array($consulta))
{
?>	

<div style="text-align:justify;">
<p style="text-align:justify;"><?php echo $dados['sobre'];?></p>
</div>
<?php } ?>




<div class="row">
<div class="col-md-12">
<center>
	<b>CONHEÇAÍ – DESENVOLVEDORES</b>
	<br/><br/>
<a href="#" data-toggle="modal" data-target="#myModal"><img src="ponks.png" width="120px">


</a></center>
</div>
</div>

<br/>






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Contaí - Desenvolvedores</h4>
      </div>
      <div class="modal-body">
   







<div class="row">
<div class="col-md-12">
<div class="col-md-4" style="text-align:center;">
<a href="http://lattes.cnpq.br/7618588075513240" target="blank">
<center><img src="integrantes/eder.png" class="img img-responsive" alt="Eder Diego de Oliveira" title="Eder Diego de Oliveira" style="width:50%;"></center>
<p style="font-size:13px;"><b>Eder Diego de Oliveira</b></p>
<p style="font-size:12px;">Analista / Idealizador</p>
</div>


<div class="col-md-4" style="text-align:center;">
<a href="http://www.facebook.com/miguel.henrique.12345" target="blank">
<center><img src="integrantes/miguel.png" class="img img-responsive" alt="Miguel Henrique Senegalha de Souza - Gerente de Projetos e Desenvolvedor de Sistemas  - www.mhsdevelopers.com.br"  title="Miguel Henrique Senegalha de Souza - Gerente de Projetos e Desenvolvedor de Sistemas  - www.mhsdevelopers.com.br" style="width:50%;"></center>
<p style="font-size:13px;"><b>Miguel Henrique</b></p>
<p style="font-size:12px;">Gerente / Desenvolvedor</p>
</a>
</div>


<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/santanamaziero" target="blank">
<center><img src="integrantes/marcus.png" class="img img-responsive" alt="Marcus Vinicius Santana Maziero" title="Marcus Vinicius Santana Maziero" style="width:50%;"></center>
<p style="font-size:13px;"><b>Marcus Vinicius</b></p>
<p style="font-size:12px;">Designer / Desenvolvedor</p>
</a>
</div>

</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/kelvyn.chrystopher" target="blank">
<center><img src="integrantes/kelvyn.png" class="img img-responsive" alt="Kelvin Christopher Molinari" title="Kelvin Christopher Molinari" style="width:50%;"></center>
<p style="font-size:13px;"><b>Kelvyn Molinari</b></p>
<p style="font-size:12px;">Designer / Desenvolvedor</p>
</a>
</div>

<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/lucas.kaibara" target="blank">
<center><img src="integrantes/lucas.png" class="img img-responsive" alt="Lucas Yoshiyuki Kaibara" title="Lucas Yoshiyuki Kaibara" style="width:50%;"></center>
<p style="font-size:13px;"><b>Lucas Kaibara</b></p>
<p style="font-size:12px;">Desenvolvedor</p>
</a>
</div>


<div class="col-md-4" style="text-align:center;">
<a href="https://www.facebook.com/matheushenrique.guerreiro" target="blank">
<center><img src="integrantes/vilar.png" class="img img-responsive" alt="Matheus Henrique Lima Vilar" title="Matheus Henrique Lima Vilar" style="width:50%;"></center>
<p style="font-size:13px;"><b>Matheus Henrique</b></p>
<p style="font-size:12px;">Desenvolvedor</p>
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
  </body>
</html>
