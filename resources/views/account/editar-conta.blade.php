@extends('layouts.dashboard-master-fluid')

@section('title') Editar Conta - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

    <div class="row">
      <div style="box-shadow: 0px 2px 4px #888888" class="col-sm-3 col-md-2 sidebar">

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

        <hr {{-- style="margin-left: -20px; margin-right: -20px; margin-bottom: 10px; --}}">

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

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 {{-- style="border-color: #488E00;" --}} class="page-header green-secondary">Editar conta</h1>

        <div class="row">

          {{-- <div class="col-lg-12" style="background-color: white; border-radius: 0; border: 1px solid #F3F3F3"> --}}

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 placeholder">
              @if(Auth::user()->role == 'prof')
                @include('layouts.includes.form-editar-prof')
              @else
                @include('layouts.includes.form-editar-user')
              @endif
            </div>

            {{-- <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5B AAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div> --}}

          {{-- </div> --}}

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