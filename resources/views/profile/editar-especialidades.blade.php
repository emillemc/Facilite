@extends('layouts.master-fluid')

@section('title') Editar Serviços - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  {{-- Primeiro cadastro (Se não existir categorias cadastradas anteriormente, esconde sidebar) --}}
  @if($profEspecialidades->count() != 0)
    {{-- SideBar --}}
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

      {{-- Imagem e botão 'Mudar foto' --}}
      <div class="text-center">
        <img src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
        <div class="input-group center-block top-5">
          <label for="input-img">
            <a class="btn btn-primary btn-sm">Mudar foto</a>
          </label>
        </div>
        <input id="input-img" type="file"  accept="image/*" style="display: none;">
      </div>
      {{-- Nome Prof --}}
      <div class="text-center">
        <h4><b>{{$profName or ''}}</b></h4>
        <hr>
      </div>
      {{-- Menu SideBar --}}
      <div class="hidden-xs">
        <nav>
          <ul class="nav nav-stacked">
            <li class="active">
                <a href="{{ route('my-profile') }}" class="text-muted">
                  <span class="glyphicon glyphicon-user"></span> Meu Perfil
                </a>
              </li>
            <li>
                <a href="{{ route('editar-perfil') }}" class="text-muted">
                  <span class="glyphicon glyphicon-picture"></span> Editar perfil
                </a>
              </li>
              <li>
                {{-- Link ativo page editar-categorias --}}
                <a href="{{ route('editar-categorias') }}" class="text-muted">
                  <span class="glyphicon glyphicon-th-large"></span> Editar categorias
                </a>
              </li>
              <li>
                <a href="{{ route('editar-servicos') }}" class="text-muted">
                  <span class="glyphicon glyphicon-th-list"></span> Editar serviços
                </a>
              </li>
              <li>
                <a href="{{ route('editar-especialidades') }}" class="active">
                  <span class="glyphicon glyphicon-th"></span> Editar especialidades
                </a>
              </li>
              <li>
                <a href="{{ route('editar-conta') }}" class="text-muted">
                  <span class="glyphicon glyphicon-cog"></span> Editar Conta
                </a>
              </li>
          </ul>
        </nav>
      </div>
      {{-- //Menu SideBar --}}

    </div>
    {{-- SideBar --}}
  @else
    {{-- Register Steps --}}
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
      <div>
        <span style="font-size: 18px;" class="text-success">1) Criar conta</span>
        <span class="text-success glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-success">2) Categorias</span>
        <span class="text-success glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-success">3) Serviços</span>
        <span class="text-success glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 20px;" class="text-primary"><b>4) Especialidades</b></span>
        <span class="text-primary glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-muted">5) Perfil </span>
        <span class="text-muted glyphicon glyphicon-question-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <h4 class="text-left" style="margin-top: 15%;">Concluído</h4>
      <div class="progress" style="margin-top: 0%">
        <div class="progress-bar progress-bar-success" style="width: 60%;">
          <span>3 de 5</span>
        </div>
      </div>
    </div>
    {{-- //Register Steps --}}
  @endif

  <div class="col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-12" style="padding: 0px;">
    <h2>Editar Especialidades</h2>
    <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>
    <hr style="margin-bottom: 4%">
  </div>

  {{-- FORM --}}
  <form class="form-horizontal" action="@if($profEspecialidades->count() != 0){{route('post-editar-especialidades')}}@else{{route('post-cadastrar-especialidades')}}@endif" method="POST">
    {{ csrf_field() }}

    {{-- BLOCO PRINCIPAL --}}
    <div class="col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-12" style="padding: 0px;">
      @forelse($servicos as $servico)
        {{-- PAINEL ESPECIALIDADES --}}
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <h3>{{$servico->name}}</h3>
          <div class="panel panel-default">
            <div class="panel-body">
              @forelse($servico->especialidades as $especialidade)
                <div class="checkbox">
                  <label for="check_{{$especialidade->id}}">
                    <input type="checkbox" id="check_{{$especialidade->id}}" name="check_{{$especialidade->id}}" value="{{$especialidade->id}}"

                      @forelse($profEspecialidades as $profEspecialidade)
                        @if( isset($profEspecialidades) && $profEspecialidade->id == $especialidade->id )
                          checked
                        @endif
                      @empty
                      @endforelse

                    />
                    {{$especialidade->name}}
                </div>
              @empty
                <span>Erro interno, tente novamente mais tarde...</span>
              @endforelse
            </div>
          </div>
        </div>
        {{-- //PAINEL ESPECIALIDADES --}}
      @empty
        <h1>Não foi possível carregar o conteúdo da página...</h1>
      @endforelse
    </div>
    {{-- //BLOCO PRINCIPAL --}}

    {{-- BLOCO BOTÃO --}}
    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 top-8">
      <div class="form-group">
        <div class="text-center">
          @if($profEspecialidades->count() != 0)
            <button type="submit" class="btn btn-md btn-success">Salvar</button>
          @else
            <button type="submit" class="btn btn-md btn-primary">Avançar <span class="glyphicon glyphicon-chevron-right"></span></button>
          @endif
        </div>
      </div>
    </div>
    {{-- //BLOCO BOTÃO --}}

  </form>
  {{-- //FORM --}}

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
@endpush