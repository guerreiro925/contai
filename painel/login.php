
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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="login.php" class="site_title"><img src="img/logo.png" style="height:57px" class="img-responsive center-margin"></a>
            </div>

            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <ul class="nav side-menu">
                  <li class="active"><a href="login.php"><i class="fa fa-home"></i> Início </a></li>
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
            <nav style="height:60px">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

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
              </div>

              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">




                    <form class="form-horizontal form-label-left" action="controlador.php?acao=acessar" method="post" enctype="multipart/form-data" novalidate>
                <h1 class="text-center">Login - Administrador</h1>

                      <div class="item form-group">
                      <p class="text-center center-margin" style="text-transform: uppercase;font-weight:bold;" class="col-md-3 col-sm-3 col-xs-12"><?php error_reporting(0); if($_GET['msg'] == 'error'){echo 'Login ou senha incorretos.';} else if($_GET['msg'] == 'session'){echo 'Por favor digite seus dados de acesso.';}?></p>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Usuário:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="usuario" id="nome" class="form-control col-md-7 col-xs-12" placeholder="Preencha o usuário:" required type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Senha:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="senha" id="nome" class="form-control col-md-7 col-xs-12" placeholder="Preencha a senha:" required type="text">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onClick="window.location.href='../index.php'">Voltar</button>
                          <button id="send" type="submit"  class="btn btn-info">EntrarAí</button>
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
          <div class="pull-right">
          </div>
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