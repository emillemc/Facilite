@extends('layouts.master-fluid')

@section('title') Editar Perfil - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
    
  <h2>Editar Perfil:</h2>
  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">{{ $error }}</h4> @endforeach @endif</span>
  <hr>
  {{-- FORMULÁRIO --}}
  <form class="form-horizontal" action="{{route('post-editar-perfil')}}" method="POST">
    {{ csrf_field() }}

    {{-- BLOCO PRINCIPAL --}}
    <div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
      {{-- ROW --}}
      <div class="row">

        {{-- FOTO PERFIL --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h3>Foto do perfil:</h3>
          {{-- <div class="text-center top-5"> --}}
            <img src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
            <input type="file" id="imgPerfil" accept="image/*" class="top-5">
          {{-- </div> --}}
        </div>
        {{-- //FOTO PERFIL --}}
        
        {{-- BLOCO CIDADE E CARTÃO --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
          <hr class="linha-horizontal2 visible-xs">
          {{-- CIDADES --}}
          <h3>Cidade:</h3>
          <div class="text-center">
            <select class="form-control">
              <optgroup label="Paraiba">
                <option value="joaoPessoa">João Pessoa</option>
                <option value="...">...</option>
                <option value="...">...</option>
                <option value="...">...</option>
              </optgroup>
              <optgroup label="Pernambuco">
                <option value="...">...</option>
                <option value="...">...</option>
                <option value="...">...</option>
                <option value="...">...</option>
              </optgroup>
            </select>
          </div>
          <hr class="linha-horizontal2">
          {{-- //CIDADES --}}

          {{-- URL PERFIL --}}
          <h3>Url do perfil:</h3>
          <div class="text-center">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-6">
              <span style="font-size: 21px; color: #6CA7BF"><i>facilite.com/</i></span>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-6 col-xs-6">
              <input type="text" name="url_perfil" id="url_perfil" class="form-control">
            </div>
          </div>
          {{-- //URL PERFIL --}}

          {{-- CARTÃO --}}
          {{-- <h3>Aceita cartão?</h3>
          <div class="text-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="radio-inline">
                <label for="cartaoSim"><input checked type="radio" name="optCartao" id="cartaoSim">Sim</label>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="radio-inline">
                <label for="cartaoNao"><input type="radio" name="optCartao" id="cartaoNao">Não</label>
              </div>
            </div>
          </div> --}}
          {{-- //CARTÃO --}}
        </div>
        <!-- //BLOCO CIDADE E CARTÃO -->
      </div>
      <!-- //ROW -->

      <!-- DESCRIÇÃO -->
      <div class="col-lg-12 col-md-12 top-5">
        <div class="row">
          <hr class="linha-horizontal3 visible-xs">
          <h3>Descrição:</h3>
          <textarea class="form-control" rows="5"></textarea>
        </div>
      </div>
      <!-- //DESCRIÇÃO -->

    </div>
    <!-- //BLOCO PRINCIPAL -->

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-5">
      <div class="form-group">
        <div class="text-center">
          <a class="btn btn-primary" href="{{route('editar-especialidades')}}" role="button">Voltar</a>
        </div>
      </div>  
    </div>

    <!-- BOTÃO SUBMIT -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-5">
      <div class="form-group">
        <div class="text-center">
          <button type="submit" class="btn btn-success btn-md">Salvar</button>
        </div>
      </div>  
    </div>
    <!-- //BOTÃO SUBMIT -->

  </form>
  <!-- //FORMULÁRIO -->

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
@endpush