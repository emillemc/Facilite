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

    <title>Cadastrar Especialidades - Facilite Serviços</title>

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
      <h2 class="text-center">Selecione as especialidades:</h2>
      <!-- FORMULÁRIO -->
      <form class="form-horizontal top-5" action="/cadastro/perfil">
        
        <div class="col-lg-1 col-md-1"></div>

        <!-- BLOCO PRINCIPAL -->
        <div class="col-lg-10 col-md-10">
          <!-- ROW -->
          <div class="row">
            
            <!-- PAINEL ESPECIALIDADES -->
            <div class="col-lg-4 col-md-4 col-sm-6">
              <h3>Cabeleleiro</h3>
              <div class="panel panel-default">
                <div class="panel-body">
                    <div class="checkbox">
                      <label for="checkMasculino">
                        <input type="checkbox" id="checkMasculino" value="option1">Corte Masculino
                    </div>
                    <div class="checkbox">
                      <label for="checkFeminino">
                        <input type="checkbox" id="checkFeminino" value="option2">Corte Feminino
                    </div>
                    <div class="checkbox">
                      <label for="checkBarba">
                        <input type="checkbox" id="checkBarba" value="option3">Barba
                    </div>
                    <div class="checkbox">
                      <label for="checkMechas">
                        <input type="checkbox" id="checkMechas" value="option4">Mechas
                    </div>
                    <div class="checkbox">
                      <label for="checkAlisamento">
                        <input type="checkbox" id="checkAlisamento" value="option5">Alisamento
                    </div>
                    <div class="checkbox">
                      <label for="checkSelagem">
                        <input type="checkbox" id="checkSelagem" value="option6">Selagem
                    </div>
                </div>
              </div>
            </div>
            <!-- //PAINEL ESPECIALIDADES -->

            <!-- PAINEL ESPECIALIDADES 2 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
              <h3>Serviço 2</h3>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="checkbox">
                    <label for="checkEspecialidade1">
                      <input type="checkbox" id="checkEspecialidade1" value="option1">Especialidade 1
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade2">
                      <input type="checkbox" id="checkEspecialidade2" value="option2">Especialidade 2
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade3">
                      <input type="checkbox" id="checkEspecialidade3" value="option3">Especialidade 3
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade4">
                      <input type="checkbox" id="checkEspecialidade4" value="option4">Especialidade 4
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade5">
                      <input type="checkbox" id="checkEspecialidade5" value="option5">Especialidade 5
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade6">
                      <input type="checkbox" id="checkEspecialidade6" value="option6">Especialidade 6
                  </div>

                </div>
              </div>
            </div>
            <!-- //PAINEL ESPECIALIDADES 2 -->

            <!-- PAINEL ESPECIALIDADES 3 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
              <h3>Serviço 3</h3>
              <div class="panel panel-default">
                <div class="panel-body">
                  
                  <div class="checkbox">
                    <label for="checkEspecialidade11">
                      <input type="checkbox" id="checkEspecialidade11" value="option11">Especialidade 1
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade22">
                      <input type="checkbox" id="checkEspecialidade22" value="option22">Especialidade 2
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade33">
                      <input type="checkbox" id="checkEspecialidade33" value="option33">Especialidade 3
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade44">
                      <input type="checkbox" id="checkEspecialidade44" value="option44">Especialidade 4
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade55">
                      <input type="checkbox" id="checkEspecialidade55" value="option55">Especialidade 5
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade66">
                      <input type="checkbox" id="checkEspecialidade66" value="option66">Especialidade 6
                  </div>

                </div>
              </div>
            </div>
            <!-- //PAINEL ESPECIALIDADES 3 -->

            <!-- PAINEL ESPECIALIDADES 4 -->
            <div class="col-lg-4 col-md-4 col-sm-6">
              <h3>Serviço 4</h3>
              <div class="panel panel-default">
                <div class="panel-body">

                  <div class="checkbox">
                    <label for="checkEspecialidade111">
                      <input type="checkbox" id="checkEspecialidade111" value="option111">Especialidade 1
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade222">
                      <input type="checkbox" id="checkEspecialidade222" value="option222">Especialidade 2
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade333">
                      <input type="checkbox" id="checkEspecialidade333" value="option333">Especialidade 3
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade444">
                      <input type="checkbox" id="checkEspecialidade444" value="option444">Especialidade 4
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade555">
                      <input type="checkbox" id="checkEspecialidade555" value="option555">Especialidade 5
                  </div>
                  <div class="checkbox">
                    <label for="checkEspecialidade667">
                      <input type="checkbox" id="checkEspecialidade667" value="option667">Especialidade 6
                  </div>

                </div>
              </div>
            </div>
            <!-- //PAINEL ESPECIALIDADES 4 -->

          </div>
          <!-- //ROW -->
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