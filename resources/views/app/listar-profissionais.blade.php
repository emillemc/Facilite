{{-- @inject('categorias', 'App\InjectCategorias') --}}
@extends('layouts.master-fluid')

@section('title') {{ $servico->name or "Serviços - Facilite Serviços" }} - Facilite Serviços  @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  {{-- BreadCrumb --}}
  <ol class="breadcrumb">
    <li><span class="glyphicon glyphicon-menu-right" style="font-size: 12px;"></span><a href="{{ route('home') }}"> Pagina inicial</a></li>
    <li><a href="{{ route('categorias') }}">Categorias</a></li>
    <li><a href="{{ url("/categorias/$categoria->url") }}">{{$categoria->name}}</a></li>
    <li class="active">{{$servico->name}}</li>
  </ol>

	<h4>Profissionais encontrados em "{{$servico->name}}" :</h4>
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
              <p>Não foi possível carregar o conteúdo...</p>
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
    <div class="col-lg-10 col-md-9 col-sm-9">
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
                <h4 class="panel-title text-center"><b>{{$profissional->user->name}}</b></h4>
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
              {{-- @forelse($profissional->servicos->where('professionals.id', $profissional->id) as $servico)
                <span>•{{$servico->name}}&nbsp;</span>
              @empty
                <span>Não foi possível carregar os serviços...</span>
              @endforelse --}}
                <hr>
                <i><p>Aqui descrição...</p></i>
            </div>

            {{-- Se for visitante abre modal-login --}}
            @if( Auth::guest() )
              <div class="panel-footer text-center">
                <a href="#login" data-toggle="modal" data-target="#modalLogin">Ver Perfil</a>
              </div>

              @include('layouts.includes.modal-login')

            {{-- Se não mostra perfil do profissional --}}
            @else
              <div class="panel-footer text-center">
                <a href="{{url("/perfis/$profissional->url_perfil")}}">Ver Perfil</a>
              </div>
            @endif

          </div>
        </div>
        @empty
          <h1>Não foi possível carregar o conteúdo...</h1>
        @endforelse

    </div>
    <!-- //BLOCO PRINCIPAL 2 CONTEÚDO (LISTA DE PROFISSIONAIS) -->
  </div>
  <!-- //ROW-->

@endsection

@section('footer')
	@include('layouts.includes.footer')
@endsection