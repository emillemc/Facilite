@extends('layouts.master-fluid')

@section('title') Editar Perfil - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

  {{-- SIDEBAR-NAV --}}
  <div style="box-shadow: 0px 2px 4px #888888" class="col-sm-4 col-md-3 col-lg-2 sidebar">

    @if($profile->status == 'active')

      {{-- IMAGE USER --}}
      <div class="text-center">
        <div class="input-group center-block top-5">
          <label for="input-img">
            @if(Auth::user()->isProfessional != null)
              <img src="/uploads/avatars/{{ Auth::user()->isProfessional->avatar }}" class="img-circle">
            @endif
            <form enctype="multipart/form-data" id="form-change-avatar" action="/profile/editar/avatar" method="POST">
            <!-- <input type="file" name="avatar"> -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input id="input-img" type="file" name="avatar"  accept="image/*" style="display: none;" onchange="document.getElementById('form-change-avatar').submit();">
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
        <span style="font-size: 18px;" class="green-third">3) Serviços</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 18px;" class="green-third">4) Especialidades</span>
        <span class="green-third glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <hr>
      <div>
        <span style="font-size: 20px;" class="cyan-third"><b>5) Perfil</b></span>
        <span class="cyan-third glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
      </div>
      <h4 class="text-left" style="margin-top: 15%;">Cadastro:</h4>
      <div class="progress" style="margin-top: 0%;">
        <div class="progress-bar progress-bar-success" style="width: 80%; background-color: #5BB400;">
          <span>4 de 5</span>
        </div>
      </div>

    @endif

  </div>
  
  {{-- MAIN - CONTENT --}}
  <div style="background-color: #FFFFFF; border: 1px solid #ECECEC;" class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">

    @if($profile->status == 'active')
      <h1 class="page-header green-third">Editar perfil</h1>
    @else
      <h1 class="page-header green-third">Cadastrar perfil</h1>
    @endif
      
    {{-- FORM EDITAR PERFIL --}}
    @include('layouts.includes.form-editar-perfil')

  </div>

@endsection

@section('footer')
  {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  <script src="{{ asset('js/show-hidden-buttons.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush