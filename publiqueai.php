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
    <link href="assets/css/alert-style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="assets/bootstrap.min.css" rel="stylesheet" />
    <script src="assets/js/modernizr.js"></script>
   <script src="assets/js/jquery-min-110.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/validar.js"></script>


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
			<span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase;">Publique</span><span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase">Aí</span><br>
				
 	</div></div>

 	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->
	
	<div class="container" style="background-color:#f2f2f2; border-radius:0px 0px 30px 30px;">



	 	<div class="row">	 			
	 		
	 		<div class="col-lg-8">
	 			<h3 style="color:#025287; font-weight:bold">Contaí seu conto para nós</h3><br>
	 			<div class="hline" style="border-bottom: 2px solid #025287;"></div><br>
		 			<form role="form" data-toggle="validator" action="controladorPubliqueai.php?acao=inserir_conto" method="post">
					  <div class="form-group">
					    <input type="text" data-error="Preencha seu nome.." name="nomeAutor" class="form-control" id="exampleInputEmail1" style="height:40px; text-indent:20px;" required placeholder="Nome Do Autor (Obrigatório)">
					  <div class="help-block with-errors"></div>
					  </div>
					  <div class="form-group">
					    <input type="text" data-error="Preencha o seu sobrenome.." name="sobrenomeAutor" class="form-control" id="exampleInputEmail1" style="height:40px; text-indent:20px;" required placeholder="Sobrenome Do Autor (Obrigatório)">
					   <div class="help-block with-errors"></div>
					 </div>
					  <div class="form-group">
					    <input type="number" data-error="Preencha a sua idade corretamente.." step="1" min="1" max="150" name="idadeAutor" class="form-control" id="exampleInputEmail1" style="height:40px; text-indent:20px;" required placeholder="Idade Do Autor (Obrigatório)">
					   <div class="help-block with-errors"></div>
					  </div>
					  <div class="form-group">
					    <input type="email" data-error="Preencha o seu email válido.." name="emailAutor" class="form-control" id="exampleInputEmail1" style="height:40px; text-indent:20px;" required placeholder="Email Do Autor (Obrigatório)">
					  <div class="help-block with-errors"></div>
					  </div>
                      <div class="form-group">
                      	<select style="height:40px; text-indent:20px;" name="categoria" class="form-control" id="exampleInputEmail1" required>
                        	<option value="">Selecione a Categoria do Conto (Obrigatório)</option>
								<?php
								include("conexao.php");
								
								$consulta = mysql_query("SELECT * FROM categorias WHERE deletar != 1");
								while($dados = mysql_fetch_array($consulta))
								{ ?>

									<option value="<?php echo $dados['idCategoria'] ?>"> <?php echo $dados['nome'] ?> </option>
				
								<?php } ?>
                        </select>			  
                      <div class="help-block with-errors"></div>
	       </div>	
                      <div class="form-group">
                      	<select data-error="Selecione uma unidade.." style="height:40px; text-indent:20px;" name="unidade" class="form-control" id="exampleInputEmail1" required>
                        	<option value="">Selecione a Unidade mais perto de sua casa (Obrigatório)</option>
                        	<option value="1">Outros...</option>
								<?php
								include("conexao.php");
								
								$consulta = mysql_query("SELECT * FROM unidades WHERE deletar != 1");
								while($dados = mysql_fetch_array($consulta))
								{ ?>

									<option value="<?php echo $dados['idUnidade'] ?>"> <?php echo $dados['nome'] ?> </option>
				
								<?php } ?>
	        
                        </select>
                      <div class="help-block with-errors"></div>			  
                      </div>
					  <div class="form-group">
					    <input data-error="Preencha um titútlo para seu conto.." name="titulo_conto" type="text" class="form-control" id="exampleInputEmail1" style="height:40px; text-indent:20px;" required placeholder="Título do Conto (Obrigatório)" required>
					  <div class="help-block with-errors"></div>
					  </div>
					  <div class="form-group">
					  	<textarea data-error="Preencha história do seu conto.." placeholder="Conto (Obrigatório)" name="conto" class="form-control" id="message1" rows="3" style="resize:vertical; text-indent:20px; height:180px;" required></textarea>
					  <div class="help-block with-errors"></div>
					  </div>
					  <button type="submit" name="btn-enviar" class="btn btn-primary">PubliqueAí</button>
					</form>
                    <br><br>
			</div><!--/col-lg-8 -->
	 		
	 		<div class="col-lg-4">
		 		<h3 style="color:#025287; font-weight:bold">PubliqueAí</h3><br>
		 		<div class="hline" style="border-bottom: 2px solid #025287;"></div>
		 			<p style="color:#025287; font-weight:bold; text-align:justify;">A contaí tem como objetivo incentivar pessoas a escreverem suas histórias para serem disponibilizadas à toda a comunidade, bem como ter a oportunidade de ler as histórias publicadas por outras pessoas de vários lugares do país. Esses contos podem ser dos mais variados gêneros, tais como infantil, aventura, romance e terror.</p>
	 		</div>
	 	</div><!--/row -->

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
 <script src="assets/js/alert-script.js"></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>
