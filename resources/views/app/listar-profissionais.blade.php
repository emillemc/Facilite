{{-- @inject('categorias', 'App\InjectCategorias') --}}
@extends('layouts.master-fluid')

@section('title') {{ $servico->name or "Serviços - Facilite Serviços" }} - Facilite Serviços  @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  {{-- BreadCrumb --}}
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}">Pagina inicial</a></li>
    <li><a href="{{ route('categorias') }}">Categorias</a></li>
    <li><a href="{{ url("/categorias/$categoria->url") }}">{{$categoria->name}}</a></li>
    <li class="active">{{$servico->name}}</li>
  </ol>

	<h3>Profissionais encontrados em "{{$servico->name}}" :</h3>
  <hr>
  <!-- ROW -->
  <div class="row">
    
    <!-- ~***********************************************************************
    ****************** BLOCO PRINCIPAL 1 ESQUERDA (FILTROS) *********************
    ***************************************************************************** -->
    <div class="col-lg-2 col-md-3 col-sm-3">

      <!-- ESPECIALIDADES -->
      <h4>Especialidades:</h4>
      <div class="panel panel-default">
        <div class="panel-body">
          @forelse($especialidades as $especialidade)
            <div class="checkbox">
              <label for="check_{{$especialidade->id}}">
                <input type="checkbox" id="check_{{$especialidade->id}}" value="{{$especialidade->id}}">{{$especialidade->name}}
            </label>
            </div>
          @empty
            <div>
              <p>Não foi possível carregar as especialidades...</p>
            </div>
          @endforelse
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
      @forelse($profissionais as $profissional)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <h4 style="color: white;"> - </h4> <!-- GAMBIARRA -->
          <div class="panel panel-default">
            <div class="panel-heading clearfix"> <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
              <div class=" col-md-4  text-center">  <!-- BLOCO FOTO PROFISSIONAL -->
                <img src="{{ asset('img/perfil2.png') }}" alt="img_perfil2" class="img-circle">
              </div>
              <!-- BLOCO NOME E ESTRELAS PROFISSIONAL -->
              <div class="col-md-8 ">
                <h4 class="panel-title text-center"><b>{{$profissional->name}}</b></h4>
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
        @empty
          <h1>Não foi possível carregar o profissional...</h1>
        @endforelse
      
      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  
      <!-- BLOCO PROFISSIONAL 2 -->
      {{-- <div class="col-lg-4 col-md-6 col-sm-6"> --}}
        <!-- GAMBIARRA -->
        {{-- <h4 class="txt-branco"> - </h4>  --}}
        {{-- <div class="panel panel-default"> --}}
          <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
          {{-- <div class="panel-heading clearfix">  --}}
            <!-- BLOCO FOTO PROFISSIONAL -->
            {{-- <div class="col-md-4 text-center">  
              <img src="{{ asset('img/perfil2.png') }}" alt="img_perfil2" class="img-circle">
            </div> --}}
            <!-- BLOCO NOME E ESTRELAS PROFISSIONAL -->
            {{-- <div class="col-md-8">  
              <h4 class="panel-title text-center"><b>Profissional 2</b></h4>
              <hr> --}}
              <!-- ESTRELAS -->
              {{-- <div class="text-center">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 25px;"></span>
              </div> --}}
              <!-- //ESTRELAS -->
            {{-- </div>
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
      </div> --}}
      <!-- //BLOCO PROFISSIONAL 2 -->

      <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    </div>
    <!-- //BLOCO PRINCIPAL 2 CONTEÚDO (LISTA DE PROFISSIONAIS) -->
  </div>
  <!-- //ROW-->

@endsection

@section('footer')
	@include('layouts.includes.footer')
@endsection