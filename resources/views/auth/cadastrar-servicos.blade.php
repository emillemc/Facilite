<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>Cadastrar Servicos - Facilite Serviços</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- CSS Pessoal -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"><!-- Toggle navigation --></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">Facilite Serviços</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right text-center">
                <!-- <li class="active"><a href="#">Home</a></li> -->
                <!-- <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul> -->
                  <li class="visible-xs">
                    <a href="/login">
                      <button type="button" class="btn btn-success btn-md">Entrar</button>
                    </a>
                  </li>
                  <li class="visible-sm visible-md visible-lg">
                    <a href="/login"><b>Entrar<b></a>
                  </li>
                <!-- </li> -->
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    
    <!-- CONTAINER -->
    <div class="container top-10">
      <h2 class="text-center">Selecione os serviços:</h2>
      <!-- FORMULÁRIO -->
      <form class="form-horizontal top-5" action="/cadastro/especialidades">
        
        <div class="col-lg-1 col-md-1"></div>

        <!-- BLOCO PRINCIPAL -->
        <div class="col-lg-10 col-md-10">
          <!-- BLOCO 1 -->
          <div class="row">
            <h3>Moda e Beleza</h3>
            <hr class="linha-horizontal">
            <!-- BLOCO CHECKBOX's -->
            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkManicure">
                    <input type="checkbox" id="checkManicure" value="option1">Manicure
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkCabeleleiro">
                    <input type="checkbox" id="checkCabeleleiro" value="option2">Cabeleleiro
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkMaquiador">
                   <input type="checkbox" id="checkMaquiador" value="option3">Maquiador
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkEsteticista">
                    <input type="checkbox" id="checkEsteticista" value="option4">Esteticista
                </div>
              </div>
            </div>
            <!-- //BLOCO CHECKBOX's -->
          </div>
          <!-- //BLOCO 1 -->
          
          <!-- BLOCO 2 -->
          <div class="row top-5">
            <h3>Categoria 2</h3>
            <hr class="linha-horizontal">
            <!-- BLOCO CHECKBOX's -->
            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check1">
                    <input type="checkbox" id="check1" value="option1">Serviço 1
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check2">
                    <input type="checkbox" id="check2" value="option2">Serviço 2
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check3">
                   <input type="checkbox" id="check3" value="option3">Serviço 3
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check4">
                    <input type="checkbox" id="check4" value="option4">Serviço 4
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- //BLOCO 2 -->

          <!-- BLOCO 3 -->
          <div class="row top-5">
            <h3>Categoria 3</h3>
            <hr class="linha-horizontal">
            <!-- BLOCO CHECKBOX's -->
            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check11">
                    <input type="checkbox" id="check11" value="option11">Serviço 1
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check22">
                    <input type="checkbox" id="check22" value="option22">Serviço 2
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check33">
                   <input type="checkbox" id="check33" value="option33">Serviço 3
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check44">
                    <input type="checkbox" id="check44" value="option44">Serviço 4
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- //BLOCO 3 -->

        </div>
        <!-- //BLOCO PRINCIPAL -->

        <div class="col-lg-1 col-md-1"></div>

        <!-- BOTÃO SUBMIT -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-8">
          <div class="form-group">
            <div class="text-center">
              <button type="submit" class="btn btn-success btn-md">Continuar</button>
            </div>
          </div>  
        </div>
        <!-- //BOTÃO SUBMIT -->
      </form>
      <!-- //FORMULÁRIO -->
    </div>
    <!-- ///CONTAINER -->
    <!-- FOOTER -->
    <footer class="top-10">
      <p class="text-center">&copy; 2016 &middot; <a href="http://www.facilitenegocios.com.br/" target="_blank">Facilite Negócios</a></p>
    </footer>
    <!-- //FOOTER -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>