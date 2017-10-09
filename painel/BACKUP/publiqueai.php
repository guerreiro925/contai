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
            
            <span style="color:#fff; font-weight:bold; font-size:26px; text-transform:uppercase">Gerenciar Contos </span>
            <span style="color:#00b3fe; font-weight:bold; font-size:26px; text-transform:uppercase"> Publiqueaí</span>
            
           <br>
           <br><br>  
                     
       <table  width="100%" height="2%" border="2px" class="table table-responsive table-bordered table-striped" bordercolor="#FFFFFF" style="text-align: center; margin: 0 auto;">
	<tr>
    
    	<th style="font-size:16px">Código</th>
        <th style="font-size:16px">Nome do Autor</th>
        <th style="font-size:16px">Categoria do Conto</th>
        <th style="font-size:16px">Título do Conto</th>
        <th style="font-size:16px">Data</th>
        <th style="font-size:16px">Ação</th>
    </tr>

<?php
	
	$usuario = $_SESSION['usuario'];
	
	$query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
	while($dados = mysql_fetch_array($query)){
	$nivel = $dados['nivel'];		
	$idUnidade_U = $dados['idUnidade'];		
				

if($nivel == 'ADMIN'){
$consulta = mysql_query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y') as data FROM publiqueai WHERE deletar != '1' ORDER BY idConto DESC");
} else {
$consulta = mysql_query("SELECT *, DATE_FORMAT(data, '%d/%m/%Y') as data FROM publiqueai WHERE deletar != '1' AND idUnidade = '$idUnidade_U' ORDER BY idConto DESC");
}
while ($dados = mysql_fetch_array($consulta))
{
	$idConto = $dados['idConto'];
	$idCategoria = $dados['idCategoria'];
	$idUnidade = $dados['idUnidade'];
	$conto = $dados['conto'];
	$conto2 = strip_tags($conto);
?>    
	<tr>
    	<td style="color:#FFFFFF; text-align:left;"><?php echo $dados['idConto'];?></td>
        <td style="color:#FFFFFF; text-align:left;"><?php echo $dados['nomeAutor'];?> <?php echo $dados['sobrenomeAutor'];?></td>
        <td style="color:#FFFFFF; text-align:left;"><?php $query = mysql_query("SELECT * FROM categorias WHERE idCategoria = '$idCategoria'"); 
							while($resultado = mysql_fetch_array($query)){ echo $resultado['nome']; }?></td>
        <td style="color:#FFFFFF; text-align:left;"><?php echo $dados['titulo']; ?></td>
        <td style="color:#FFFFFF; text-align:left;"><?php echo $dados['data']; ?></td>
        <td style="color:#FFFFFF; text-align:left;">
<a type="button" data-toggle="modal" data-target="#myModal<?php echo $dados['idConto']; ?>" href=""><i class="fa fa-search" style="font-size:18px;"></i></a>
<a href="alterar_conto.php?idConto=<?php echo $dados['idConto'] ?>"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
<a href="controladorPubliqueai.php?acao=excluir_conto&idConto=<?php echo $dados['idConto'] ?>"><i class="fa fa-trash-o" style="font-size:18px;"></i></a>
        </td>
    </tr>

    <tr>
    </tr>

								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $dados['idConto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="text-align:left;">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel">Título do Conto: <?php echo $dados['titulo']; ?></h4>
											</div>
											<div class="modal-body">
												<p>Nome do Autor: <?php echo $dados['nomeAutor']; ?> <?php echo $dados['sobrenomeAutor']; ?></p>
												<p>Idade do Autor: <?php echo $dados['idadeAutor']; ?> <?php if ($dados['idadeAutor'] == 1) { echo "ano"; } 
		  else { echo "anos"; } ?></p>
                                                <p>Email do Autor: <?php echo $dados['emailAutor']; ?></p>
												<p>Categoria do Conto: <?php $query = mysql_query("SELECT * FROM categorias WHERE idCategoria = '$idCategoria'"); 
				while($resultado = mysql_fetch_array($query)){ echo $resultado['nome']; }?></p>
                								<p>Data do Conto: <?php echo $dados['data']; ?></p>													 												<p>Para a Unidade: 
												<?php  
					
												if ($dados['idUnidade'] == 0) {
												echo "Não especificado";	
												}
					
												else {
												$query2 = mysql_query("SELECT * FROM unidades WHERE idUnidade = '$idUnidade'"); 
												while($resultado2 = mysql_fetch_array($query2)){ echo $resultado2['nome']; }} ?></p><br>
												<p style="text-indent:70px;"><?php echo $conto2 ;?></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->


<?php 

} } ?>

   
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
