@extends('layouts.master-fluid')

@section('title') Editar Serviços - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

  {{-- SIDEBAR-NAV --}}
  <div style="box-shadow: 0px 2px 4px #888888" class="col-sm-4 col-md-3 col-lg-2 sidebar">

    @if(count($profile->servicos) != 0)

      {{-- IMAGE USER --}}
      <div class="text-center">
        <div class="input-group center-block top-5">
          <label for="input-img">
            <img style="cursor: pointer;" src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
            <br>
            {{-- <a id="btn-img-perfil" style="display: none;" class="btn btn-primary btn-sm">Mudar foto</a> --}}
          </label>
        </div>
        <input id="input-img" type="file"  accept="image/*" style="display: none;">
        <h4 class="green-third">{{$profile->user->name}}</h4>
      </div>

      <hr>

      {{-- MENU DASHBOARD --}}
      @include('layouts.includes.menu-prof')

    @else

      {{-- REGISTER STEPS --}}
      <div>
        <span style="font-size: 18px;" class="green-third">1) Criar conta</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="green-third">2) Categorias</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 20px;" class="cyan-third"><b>3) Serviços</b></span>
        <span class="cyan-third glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-muted">4) Especialidades</span>
        <span class="text-muted glyphicon glyphicon-question-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="text-muted">5) Perfil </span>
        <span class="text-muted glyphicon glyphicon-question-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <h4 class="text-left" style="margin-top: 15%;">Concluído</h4>
      <div class="progress" style="margin-top: 0%">
        <div class="progress-bar progress-bar-success" style="width: 40%;">
          <span>2 de 5</span>
        </div>
      </div>

    @endif

  </div>
  
  {{-- MAIN - CONTENT --}}
  <div style="background-color: #FFFFFF; border: 1px solid #ECECEC;" class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">

    @if(count($profile->servicos) != 0)
      <h1 class="page-header green-third">Editar serviços</h1>
    @else
      <h1 class="page-header green-third">Cadastrar serviços</h1>
    @endif
    <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>

    <div {{-- style="background-color: white; box-shadow: 0px 0px 1px #AEAEAE;" --}} class="row placeholders">

      {{-- FORM EDITAR SERVICOS --}}
      @include('layouts.includes.form-editar-servicos')
      
    </div>
      

  </div>

@endsection

@section('footer')
  {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
@endpush