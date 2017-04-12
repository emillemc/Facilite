@extends('layouts.master-fluid')

@section('title') Minha Conta - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
      
  {{-- SIDEBAR-NAV --}}
  <div {{-- style="box-shadow: 1px 0px 4px #888888" --}} style="border: 1px solid #ECECEC;" class="col-sm-4 col-md-3 col-lg-2 sidebar">

    {{-- Image User--}}
    <div class="text-center">
      <div class="input-group center-block top-5">
        <label for="input-img">
          <img style="cursor: pointer;" src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
          <br>
          {{-- <a id="btn-img-perfil" style="display: none;" class="btn btn-primary btn-sm">Mudar foto</a> --}}
        </label>
      </div>
      <input id="input-img" type="file"  accept="image/*" style="display: none;">
      <h4 class="green-third">{{$user->name or $prof->user->name}}</h4>
    </div>

    <hr>

    {{-- MENU DASHBOARD --}}
    @if(Auth::user()->role == 'prof')
      {{-- Menu prof --}}
      @include('layouts.includes.menu-prof')
    @else
      {{-- Menu user --}}
      @include('layouts.includes.menu-user')
    @endif

  </div>

  <div style="background-color: #FFFFFF; border: 1px solid #ECECEC;" class="col-sm-8 col-sm-offset-4 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
    <h1 {{-- style="border-color: #488E00;" --}} class="page-header green-secondary">Minha conta</h1>

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 placeholder">
        @if(Auth::user()->role == 'prof')
          @include('layouts.includes.form-editar-prof')
        @else
          @include('layouts.includes.form-editar-user')
        @endif
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 placeholder">
        @include('layouts.includes.actions-minha-conta')
      </div>

    </div>

  </div>

@endsection

@section('footer')
  {{-- @include('layouts.includes.footer') --}}
@endsection

@push('scripts')
  {{-- check-uncheck.js --}}
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  {{-- JQuery/JQuery Mask Plugins --}}
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
   {{-- Eventos do Formulário --}}
  <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>
@endpush