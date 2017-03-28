@extends('layouts.master-fluid')

@section('title') Editar Conta - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
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
    
    {{-- Nome User --}}
    <div class="text-center">
      <h4><b>{{$userName or $profName}}</b></h4>
      <hr>
    </div>
		
		{{-- Menu --}}
    <div class="hidden-xs">

      <!-- MENU EDITAR-CONTA-->
        @if(Auth::user()->role == 'prof')
          {{-- Profissional logado, exibe menu-prof --}}
          @include('layouts.includes.menu-prof')
        @else
          {{-- Exibe menu-user --}}
          @include('layouts.includes.menu-user')
        @endif
      <!-- //MENU EDITAR-CONTA -->

    </div>
  </div>

  <div class="col-lg-offset-1 col-lg-8 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-12" style="padding: 0px;">
    <h2>Editar Conta</h2>
    <hr style="margin-bottom: 4%">
  </div>
		
		<!-- EDITAR-CONTA-->
      <div class="form-horizontal col-lg-offset-1 col-lg-7 col-md-offset-1 col-md-8 col-sm-offset-1 col-sm-7 col-xs-12" style="padding: 0px;"">

        <div class="col-lg-7 col-md-7 col-xs-12">

          @if(Auth::user()->role == 'prof')
            {{-- Profissional logado, exibe form-prof --}}
            @include('layouts.includes.form-editar-prof')
          @else
            @include('layouts.includes.form-editar-user')
          @endif

        </div>

      </div>
    <!-- //EDITAR-CONTA -->

@endsection

@section('footer')
    @include('layouts.includes.footer')
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