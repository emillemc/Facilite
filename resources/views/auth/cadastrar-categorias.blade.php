@extends('layouts.master-fluid')

@section('title') Cadastrar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')

  <h2>Seleciona as categorias:</h2>
  <hr style="margin-bottom: 50px;">

  <!-- BLOCO PRINCIPAL -->
  <form action="{{route('post-cadastrar-categorias')}}" method="POST">
    
    {{ csrf_field() }}

    @forelse($categorias as $categoria)
      <div id="div-categoria" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div id="div-bg" style="margin: 20px 0px 5px 0px; box-shadow: 3px 3px #545050; border: 2px solid; border-radius: 10px 10px 10px 10px ">
          <input id="cat_{{$categoria->id}}" name="cat_{{$categoria->id}}" type="checkbox" style="display: none;">
          <span id="check_span" name="check_span" class="glyphicon glyphicon-unchecked" style="font-size: 25px; padding: 3px 2px 0px 3px;"></span>
          <label id="label-cat" class="text-center" for="cat_{{$categoria->id}}" style="font-weight: normal; margin: 0px; font-size: 25px; padding: 0px 0px 0px 0px;">{{$categoria->name}}</label>
        </div>
      </div>

    @empty

      <h1>Não foi possível carregar as categorias...</h1>

    @endforelse

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top: 120px;"></div>
      <div class="col-md-4 col-sm-4"></div>
        <div class="col-md-4">
          <div class="col-md-5 col-md-offset-4">
          <div class="input-group">
            <input type="submit" class="btn btn-lg btn-success" value="Avançar">
          </div>
          </div>
        </div>
      <div class="col-md-4 col-sm-4"></div>

  </form>
@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
<script src="{{ asset('js/check-uncheck.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush
