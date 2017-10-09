<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/icon.png">

    <title>Contaí | Painel Administrativo</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/demo.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>

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
       
       
         <?php include('menu.php');?>
        
        
      </div>
    </div>
  <div id="headerwrap" style="border-top:3px solid #fff;">
	    <div class="container">
			<div class="row">
 			<div class="bg_top"></div>
			<div class="col-lg-12">
            <div class="panel-body" style="background-color:#006DB4; border-radius:5px;">
            	<center>
                
                <div class="col-md-12">
                
				<?php 
				include("conexao.php");
				
				$idConto = $_GET['idConto'];
				
				$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
				while($dados = mysql_fetch_array($consulta)){
					$idConto = $dados['idConto'];
				?>
                
                <span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase">Autor do conto: </span>
            	<span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase"><?php echo $dados['nomeAutor']; ?> <?php echo $dados['sobrenomeAutor']; ?></span>                
                
                	<br />
                
                <span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase">Título do conto: </span>
            	<span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase"><?php echo $dados['titulo']; ?></span>
                    
                <?php } ?>
                    
                </div>
                
                <div class="col-md-6">
                
                <?php 
				include("conexao.php");
				
				$idConto = $_GET['idConto'];
				
				$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
				while($dados = mysql_fetch_array($consulta)){
					$idConto = $dados['idConto'];
				?>
                
		 		<form role="form" action="controladorPubliqueai.php?acao=alterar_conto" method="post">
                
                	<input type="hidden" name="idConto" value="<?php echo $dados['idConto']; ?>">
                    
            		<br /><br />
                    
					<textarea name="conto" class="form-control" id="message1" rows="3" style="resize:vertical; text-indent:20px; height:340px;" required><?php echo $dados['conto'] ?></textarea>
                    
   				    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
     				<script type="text/javascript">
        				CKEDITOR.replace('conto');
					</script>
                    
                    <br />
                        
                        <select style="height:40px; text-indent:20px;" name="categoria" class="form-control" required>
                    <?php 
						include("conexao.php");
				
						$idCategoria = $dados['idCategoria'];
				
						$consulta2 = mysql_query("SELECT * FROM categorias WHERE idCategoria = '$idCategoria'");
						while($dados2 = mysql_fetch_array($consulta2)){
					?>           
						<option value="<?php echo $dados2['idCategoria'] ?>"> <?php echo $dados2['nome'] ?> </option>
					<?php } ?>
					<?php
						include("conexao.php");
								
						$consulta3 = mysql_query("SELECT * FROM categorias WHERE idCategoria != '$idCategoria'");
						while($dados3 = mysql_fetch_array($consulta3))
					{ ?>

						<option value="<?php echo $dados3['idCategoria'] ?>"> <?php echo $dados3['nome'] ?> </option>
				
					<?php } ?>
                    </select>
                    
                    <br />

                	<button type="button" class="btn btn-primary" onClick="window.location='publiqueai.php'">Voltar a Página Anterior</button>
                	<button type="submit" class="btn btn-primary">Salvar</button>
                	<button type="submit" class="btn btn-primary" formaction="controladorPubliqueai.php?acao=alterar_conto_publicar">Publicar</button>
                
                </form>
                                
                <?php } ?>
                
                </div>   
                             
                <div class="col-md-6">
                
                <?php 
				include("conexao.php");
				
				$idConto = $_GET['idConto'];
				
				$consulta = mysql_query("SELECT * FROM publiqueai WHERE idConto = '$idConto'");
				while($dados = mysql_fetch_array($consulta)){
					$idConto = $dados['idConto'];
				?>
                
		 		<form role="form" action="controladorPubliqueai.php?acao=enviar_feedback&idConto=<?php echo $dados['idConto']; ?>" method="post">
                
    

                    <br /><br />
                        
                    <textarea name="feedback" class="form-control" rows="3" style="resize:vertical; text-indent:20px; height:407px;"required>Ambiente para Feedback</textarea>

                    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
     				<script type="text/javascript">
        				CKEDITOR.replace('feedback');
					</script>
                    
                    	<br />

                	<button type="submit" class="btn btn-primary">Enviar Feedback</button>
                
                </form>
                                
                <?php } ?>
                
                </div>
                
                </center>

            </div>
            </div>            
            </div>
            </div>
            </div>    
    
    

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->

	 
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
  <!-- FlexSlider -->
  <script defer src="assets/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  
  
  
  </body>
</html>
