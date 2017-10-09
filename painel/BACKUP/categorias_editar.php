
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
       
       <?php include('session.php');?>
         <?php include('menu.php');?>
        
      </div>
    </div>
  <div id="headerwrap" style="border-top:3px solid #fff;">
	    <div class="container">
			<div class="row">
 			<div class="bg_top"></div>
			<div class="col-lg-12">
            <div class="panel-body" style="background-color:#006DB4; border-radius:5px;">
            
            <span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase">Cadastrar</span>
            <span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase">Categoria</span>
            
           <br>
           <br><br>  
           

<div class="col-md-6 col-md-offset-3">

<p style="color:#fff; font-weight:bold;"><?php error_reporting(0); if($_GET['msg'] == 'ok'){echo 'Registro alterado com sucesso.';} else if($_GET['msg'] == 'error'){echo 'Erro ao alterar dados, tente novamente mais tarde.';}?></p>
<br/>


	<?php
	$id = $_GET['id'];
	$resultado = mysql_query("SELECT * FROM categorias WHERE idCategoria = '$id'");
	while($dados = mysql_fetch_array($resultado)){
	?>

			<form role="form" action="controlador.php?acao=editar_categoria" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
					  <div class="form-group">
					    <input name="nome" style="text-indent:20px; height: 40px;" type="text" class="form-control" value="<?php echo $dados['nome']; ?>">
					  </div>
                      


                       <div class="form-group">
					<input type="file" name="imagem" class="form-control" value="<?php echo $dados['imagem']; ?>"></div>


                    <div class="form-group">
                    <table>
                      <tr>
                      <td style="width:120px;">

						<label style="color:#fff;float:left;" for="textfield">Cor Categoria:</label>
						</td>
						<td>
					    <input name="cor1" style="text-indent:20px; height: 25px; width: 25px; " type="color"  id="cor1" required placeholder="Cor da Categoria (EX: #000000)" value="<?php echo $dados['cor']; ?>">

					  </td>
</tr>
<tr>
					  <div class="form-group">
					  <td>
					  <label  style="color:#fff;float:left;" for="textfield">Cor Fonte:</label>
					  </td>
					  <td>
					    <input name="cor2" style="text-indent:20px; height: 25px; width: 25px; " type="color"  id="cor1" required placeholder="Cor da Categoria (EX: #000000)" value="<?php echo $dados['cor_fonte']; ?>">
					  </div>
					  </td>
					  </tr>
					  </table>
					  <br>
					  	<textarea name="descricao"  class="form-control"  rows="3" style="resize:vertical; text-indent:20px; height:180px;" ><?php echo $dados['descricao']; ?></textarea>
					  </div>
                      
                    <center>
					  <button type="submit" class="btn btn-primary">SalveAí</button>
                      <button type="button" class="btn btn-info" onClick="window.location.href='categorias.php'">Voltar</button>
					</form>
                    
                    
                    <?php }
		?>
</div>

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
