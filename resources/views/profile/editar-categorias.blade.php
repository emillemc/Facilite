@extends('layouts.master-fluid')

@section('title') Editar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  <h2>Selecione as categorias: </h2>
  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">{{ $error }}</h4> @endforeach @endif</span>
  <hr style="margin-bottom: 50px;">

  <div class="row">
    <!-- FORM -->
    <form action="{{route('post-editar-categorias')}}" method="POST">
      
      {{ csrf_field() }}
      
      <!-- BLOCO CATEGORIAS -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        @forelse($categorias as $categoria)
          {{-- CATEGORIA --}}
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div id="div_bg_{{$categoria->id}}">
              <span id="check_span_{{$categoria->id}}" name="check_span_{{$categoria->id}}" class="glyphicon glyphicon-unchecked" style="font-size: 25px; color: #272727"></span>
              <label id="label_cat_{{$categoria->id}}" class="text-center" for="cat_{{$categoria->id}}" style="font-weight: normal; font-size: 27px;">
                <input type="checkbox" id="cat_{{$categoria->id}}" name="cat_{{$categoria->id}}" value="{{$categoria->id}}" 

                  @forelse($profCategorias as $profCategoria)
                    @if( isset($profCategorias) && $profCategoria->id == $categoria->id )
                      checked
                    @endif
                  @empty
                  @endforelse

                style="display: none;"/>
                {{$categoria->name}}
              </label>
            </div>
          </div>
          {{-- //CATEGORIA --}}
        @empty
          <h1>Não foi possível carregar as categorias...</h1>
        @endforelse

      </div>
      <!-- //BLOCO CATEGORIAS -->

      <!-- BLOCO BOTÃO -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-6">
        <div class="col-md-5 col-sm-5 col-xs-4"></div>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <div class="input-group">
            <input type="submit" class="btn btn-md btn-primary" value="Salvar">
          </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-4"></div>
      </div>
      <!-- //BLOCO BOTÃO -->

    </form>
    <!-- //FORM -->
  </div>
  <!-- //ROW -->

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush
