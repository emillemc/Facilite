@extends('aplicacao.layouts.aplicacaomaster')

@section('title') Facilite Serviços @endsection

@section('navbar')
    @include('aplicacao.includes.header')
@endsection

@section('content')
	<h2>Serviço</h2>
  <hr class="linha-horizontal4">
  <!-- ROW -->
  <div class="row">
    
    <!-- ~***********************************************************************
    ****************** BLOCO PRINCIPAL 1 ESQUERDA (FILTROS) *********************
    ***************************************************************************** -->
    <div class="col-lg-2 col-md-3 col-sm-3">

      <!-- ESPECIALIDADES -->
      <h4>Especialidades:</h4>
      <!-- <p>teste</p> -->
      <div class="panel panel-default">
        <div class="panel-body">
            <div class="checkbox">
              <label for="checkOpt1">
                <input type="checkbox" id="checkOpt1" value="option1">Especialidade 1
            </label>
            </div>
            <div class="checkbox">
              <label for="checkOpt2">
                <input type="checkbox" id="checkOpt2" value="option2">Especialidade 2
            </label>
            </div>
            <div class="checkbox">
              <label for="checkOpt3">
                <input type="checkbox" id="checkOpt3" value="option3">Especialidade 3
            </label>
            </div>
            <div class="checkbox">
              <label for="checkOpt4">
                <input type="checkbox" id="checkOpt4" value="option4">Especialidade 4
            </label>
            </div>
            <div class="checkbox">
              <label for="checkOpt5">
                <input type="checkbox" id="checkOpt5" value="option5">Especialidade 5
             </label>   
            </div>
            <div class="checkbox">
              <label for="checkOpt6">
                <input type="checkbox" id="checkOpt6" value="option6">Especialidade 6
            </label>                      
            </div>
        </div>
      </div>
      <!-- //ESPECIALIDADES -->
      
      <!-- FILTROS -->
      <h4>Filtros:</h4>
      <div class="panel panel-default">
        <div class="panel-body">
            <div class="checkbox">
              <label for="checkFoto">
                <input type="checkbox" id="checkFoto" value="option1">Com foto
            </div>
            <div class="checkbox">
              <label for="checkDesc">
                <input type="checkbox" id="checkDesc" value="option2">Com descrição
            </div>
            <div class="checkbox">
              <label for="checkCartao">
                <input type="checkbox" id="checkCartao" value="option3">Aceita cartão
            </div>
        </div>
      </div>
      <!-- //FILTROS -->

      <!-- PESQUISAR POR NOME -->
      <label for="searchNome"><h4>Nome:</h4></label>
      <div class="text-center">
        <input type="text" id="searchNome" class="form-control">
        <button type="submit" class="btn btn-primary btn-sm top-5">Buscar</button>
      </div>
      <!-- //PESQUISAR POR NOME -->

    </div>
    <!-- //BLOCO PRINCIPAL 1 ESQUERDA (FILTROS) -->
    
    <!-- *************************************************************************
    *************** BLOCO PRINCIPAL 2 CONTEÚDO (LISTA DE PROFISSIONAIS) **********
    ******************************************************************************* -->
    <div class="col-lg-10 col-md-9 col-sm-9 top-3">

      <div class="col-lg-4 col-md-6 col-sm-6">
        <!-- <h4 class="txt-branco"> - </h4> --> <!-- GAMBIARRA -->
        <div class="panel panel-default">
          <div class="panel-heading clearfix"> <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
            <div class=" col-md-4  text-center">  <!-- BLOCO FOTO PROFISSIONAL -->
              <img src="{{ asset('img/perfil2.png') }}" alt="img_perfil2" class="img-circle">
            </div>
            <!-- BLOCO NOME E ESTRELAS PROFISSIONAL -->
            <div class="col-md-8 ">
              <h4 class="panel-title text-center"><b>Profissional 1</b></h4>
              <hr>
              <!-- ESTRELAS -->
              <div class="text-center">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
              </div>
              <!-- //ESTRELAS -->
            </div>
          </div>
          <div class="panel-body">
            <p>Aqui especialidades...</p>
            <hr>
            <i><p>Aqui descrição...</p></i>
          </div>
          <div class="panel-footer text-center">
            <a href="#">Ver Perfil</a>
          </div>
        </div>
      </div>
      
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
      
      <!-- BLOCO PROFISSIONAL 2 -->
      <div class="col-lg-4 col-md-6 col-sm-6">
        <!-- <h4 class="txt-branco"> - </h4> --> <!-- GAMBIARRA -->
        <div class="panel panel-default">
          <div class="panel-heading clearfix"> <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
            <div class="col-md-4 text-center">  <!-- BLOCO FOTO PROFISSIONAL -->
              <img src="{{ asset('img/perfil2.png') }}" alt="img_perfil2" class="img-circle">
            </div>
            <div class="col-md-8">  <!-- BLOCO NOME E ESTRELAS PROFISSIONAL -->
              <h4 class="panel-title text-center"><b>Profissional 2</b></h4>
              <hr>
              <!-- ESTRELAS -->
              <div class="text-center">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
              </div>
              <!-- //ESTRELAS -->
            </div>
          </div>
          <div class="panel-body">
            <p>Aqui especialidades...</p>
            <hr>
            <i><p>Aqui descrição...</p></i>
          </div>
          <div class="panel-footer text-center">
            <a href="#">Ver Perfil</a>
          </div>
        </div>
      </div>
      <!-- //BLOCO PROFISSIONAL 2 -->

      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

      <div class="col-lg-4 col-md-6 col-sm-6">
        <!-- <h4 class="txt-branco"> - </h4> --> <!-- GAMBIARRA -->
        <div class="panel panel-default">
          <div class="panel-heading clearfix"> <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
            <div class="col-md-4 text-center">  <!-- BLOCO FOTO PROFISSIONAL -->
              <img src="{{ asset('img/perfil2.png') }}" alt="img_perfil2" class="img-circle">
            </div>
            <div class="col-md-8">  <!-- BLOCO NOME E ESTRELAS PROFISSIONAL -->
              <h4 class="panel-title text-center"><b>Profissional 3</b></h4>
              <hr>
              <!-- ESTRELAS -->
              <div class="text-center">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
              </div>
              <!-- //ESTRELAS -->
            </div>
          </div>
          <div class="panel-body">
            <p>Aqui especialidades...</p>
            <hr>
            <i><p>Aqui descrição...</p></i>
          </div>
          <div class="panel-footer text-center">
            <a href="#">Ver Perfil</a>
          </div>
        </div>
      </div>
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

      <div class="col-lg-4 col-md-6 col-sm-6">
        <!-- <h4 class="txt-branco"> - </h4> --> <!-- GAMBIARRA -->
        <div class="panel panel-default">
          <div class="panel-heading clearfix"> <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
            <div class="col-md-4 text-center">  <!-- BLOCO FOTO PROFISSIONAL -->
              <img src="{{ asset('img/perfil2.png') }}" alt="img_perfil2" class="img-circle">
            </div>
            <div class="col-md-8">  <!-- BLOCO NOME E ESTRELAS PROFISSIONAL -->
              <h4 class="panel-title text-center"><b>Profissional 4</b></h4>
              <hr>
              <!-- ESTRELAS -->
              <div class="text-center">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
              </div>
              <!-- //ESTRELAS -->
            </div>
          </div>
          <div class="panel-body">
            <p>Aqui especialidades...</p>
            <hr>
            <i><p>Aqui descrição...</p></i>
          </div>
          <div class="panel-footer text-center">
            <a href="#">Ver Perfil</a>
          </div>
        </div>
      </div>
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    </div>
    <!-- //BLOCO PRINCIPAL 2 CONTEÚDO (LISTA DE PROFISSIONAIS) -->

  </div>
  <!-- //ROW-->
@endsection

@section('footer')
	@include('aplicacao.includes.footer')
@endsection