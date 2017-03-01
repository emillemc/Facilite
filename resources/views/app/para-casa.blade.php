@extends('site.layouts.master')

@section('title') Facilite Serviços - Casa @endsection

@section('navbar')
    @include('site.includes.header')
@endsection

@section('content')
	<h2>Escolha um serviço:</h2>
  <hr>
  <div class="col-lg-1 col-md-1 col-sm-2"></div>
    <!-- BLOCO PRINCIPAL -->
    <div class="col-lg-10 col-md-10 col-sm-8">
      <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
        <!-- <img src="{{ asset('img/cabeleleiro.png') }}" alt="cabeleleiro" class="img-circle"> -->
        <h3>Eletricista</h3>
      </div>

      <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
        <!-- <img src="{{ asset('img/depilacao.png') }}" alt="depilacao" class="img-circle"> -->
        <h3>Chaveiro</h3>
      </div>

      <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
        <!-- <img src="{{ asset('img/manicure.png') }}" alt="manicure" class="img-circle"> -->
        <h3>Encanador</h3>
      </div>
    </div>
  <div class="col-lg-1 col-md-1 col-sm-2"></div>
@endsection

@section('footer')
	@include('site.includes.footer')
@endsection