@extends('layouts.master')

@section('title') Categorias - Facilite Serviços  @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')

  <h3>Categorias:</h3>
  <hr>
  <div class="col-lg-1 col-md-1 col-sm-2"></div>

    <!-- BLOCO PRINCIPAL -->
    <div class="col-lg-10 col-md-10 col-sm-8">
      <div class="col-lg-offset-1 col-lg-3 col-md-offset-1 col-md-3 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
        <h3><a href="#">Categoria 1 ...</a></h3>
      </div>
    </div>
  <div class="col-lg-1 col-md-1 col-sm-2"></div>

@endsection

@section('footer')
	@include('layouts.includes.footer')
@endsection