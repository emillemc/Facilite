@extends('layouts.master-fluid')

@section('title') Editar Perfil - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  {{-- Se houver perfil ativo, exibe sidebar --}}
  @if($profile->status == 'active')
    {{-- SideBar --}}
    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      {{-- Imagem e botão 'Mudar foto' --}}
      <div class="text-center">
        <div class="input-group center-block top-5">
          <label id="img-perfil" for="input-img">
            <img style="cursor: pointer;" src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
            <br>
            <a id="btn-img-perfil" style="display: none;" class="btn btn-primary btn-sm">Mudar foto</a>
          </label>
        </div>
        <input id="input-img" type="file"  accept="image/*" style="display: none;">
      </div>
      {{-- Nome Prof --}}
      <div class="text-center">
        <h4><b>{{$profile->user->name}}</b></h4>
        <hr class="hidden-xs">
      </div>
      {{-- Menu SideBar --}}
      <div class="hidden-xs">
        {{-- MENU EDITAR-CONTA --}}
        @if(Auth::user()->role == 'prof')
          {{-- Profissional logado, exibe menu-prof --}}
          @include('layouts.includes.menu-prof')
        @else
          {{-- Exibe menu-user --}}
          @include('layouts.includes.menu-user')
        @endif
        {{-- //MENU EDITAR-CONTA --}}
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
          <span style="font-size: 18px;" class="text-success">4) Especialidades</span>
          <span class="text-success glyphicon glyphicon-ok-sign pull-right" style="font-size: 22px;"></span>
        </div>
        <hr>
        <div>
          <span style="font-size: 20px;" class="text-primary"><b>5) Perfil</b></span>
          <span class="text-primary glyphicon glyphicon-plus-sign pull-right" style="font-size: 22px;"></span>
        </div>
        <h4 class="text-left" style="margin-top: 15%;">Cadastro:</h4>
        <div class="progress" style="margin-top: 0%">
          <div class="progress-bar progress-bar-success" style="width: 80%;">
            <span>4 de 5</span>
          </div>
        </div>
      </div>
      {{-- //Register Steps --}}
    @endif
  
  {{-- Título Page --}}
  <div class="col-lg-offset-3 col-md-offset-4 col-sm-offset-5 col-xs-offset-0">
    @if($profile->status == 'active')
      <h2>Editar Perfil</h2>
    @else
      <h2>Cadastrar Perfil</h2>
    @endif
    <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>
    <hr style="margin-bottom: 4%">
  </div>
  {{-- //Título Page --}}
  
  {{-- Url Perfil --}}
  <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-7 col-xs-12">
    <form action="{{route('post-editar-url')}}" method="POST">
      {{ csrf_field() }}
      <label for="url_perfil">Endereço do perfil:</label>
      <div class="form-inline{{ $errors->has('url_perfil') ? ' has-error' : '' }}">
          <label for="url_perfil" style="font-size: 21px; color: #6CA7BF"><i>facilite.com/profiles/</i></label>
          <input id="url_perfil" class="form-control" type="text" name="url_perfil" maxlength="25" value="@if(isset($profile->url_perfil)){{$profile->url_perfil}}@endif"/>

          @if ($errors->has('url_perfil'))
            <span class="help-block">
              <strong>{{ $errors->first('url_perfil') }}</strong>
            </span>
          @endif
        
          <button disabled id="bt-salvar-url" type="submit" class="btn btn-success btn-sm disabled" style="display:none;">Salvar</button>
      </div>
    </form>
  </div>
  {{-- //Url Perfil --}}
  
  {{-- Cidades --}}
  <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-5 col-xs-12" style="margin-top: 2%;">
    <div class="form-group">
      <label for="city">Cidade:</label>
      <select id="city" name="city" class="form-control" value="">
        <optgroup label="Paraíba">
          <option value="João Pessoa">João Pessoa</option>
          <option value="...">...</option>
        </optgroup>
      </select>
    </div>
  </div>
  {{-- //Cidades --}}
  
  {{-- Descrição Perfil --}}
  <div class="col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-7 col-xs-12" style="margin-top: 2%;">
    <form class="form-horizontal" action="{{route('post-editar-descricao')}}" method="POST">
      {{ csrf_field() }}
      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label for="">Descrição:</label for="">
          <textarea id="description" name="description" class="form-control" maxlength="1000" rows="10">@if(isset($profile->description)){{$profile->description}}@endif</textarea>

          @if ($errors->has('description'))
            <span class="help-block">
              <strong>{{ $errors->first('description') }}</strong>
            </span>
          @endif

        </div>
      </div>
      <button disabled id="bt-salvar-descricao" type="submit" class="btn btn-success btn-sm pull-right disabled" style="display:none;">Editar</button>
    </form>
  </div>
  {{-- //Descrição Perfil --}}

  <!-- BOTÃO SUBMIT -->
  <form action="{{route('post-editar-perfil')}}" method="POST">
    {{ csrf_field() }}
    <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12 top-5">
      <div class="form-group">
        <div class="text-center">
          <button type="submit" class="btn btn-success btn-sm">Atualizar dados</button>
        </div>
      </div>  
    </div>
  </form>
  <!-- //BOTÃO SUBMIT -->

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  <script src="{{ asset('js/show-hidden-buttons.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script>
    
    $('#img-perfil').hover(
      function() {
        $('#btn-img-perfil').show();
      }, function() {
        $('#btn-img-perfil').hide();
      }
    );

  </script>
@endpush