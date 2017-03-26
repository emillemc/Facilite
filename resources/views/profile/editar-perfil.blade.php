@extends('layouts.master-fluid')

@section('title') Editar Perfil - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
    
  <h2>Editar Perfil:</h2>
  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>
  <hr>
  {{-- FORMULÁRIO --}}
  {{-- <form class="form-horizontal" action="{{route('post-editar-perfil')}}" method="POST"> --}}
    {{-- Envia a requisição do tipo PUT para fazer o UPDATE  --}}
    {{-- {!! method_field('PUT') !!} --}}
    {{-- Token --}}
    {{-- {{ csrf_field() }} --}}

    {{-- BLOCO PRINCIPAL --}}
    <div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
      {{-- ROW --}}
      <div class="row">

        {{-- FOTO PERFIL --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h3>Foto do perfil:</h3>
          <div class="text-center">
            <img src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
          </div>
          <div class="top-5 text-center">
            <label for="input-img">
              <a class="btn btn-primary btn-sm">Mudar foto</a>
            </label>
            <input id="input-img" type="file"  accept="image/*" style="display: none;">
          </div>
        </div>
        {{-- //FOTO PERFIL --}}
        
        {{-- BLOCO CIDADE E URL PERFIL --}}
        <div class="col-lg-6 col-md-6 col-sm-6">
          <hr class="visible-xs">
          {{-- CIDADES --}}
          <h3>Cidade:</h3>
          <div class="text-center">
            <select id="city" name="city" class="form-control" value="@if(isset($cityProf)){{$cityProf}}@endif">
              <optgroup label="Paraiba">
                <option value="João Pessoa">João Pessoa</option>
                <option value="Teste">Teste</option>
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
          <hr>
          {{-- //CIDADES --}}

          {{-- URL PERFIL --}}
          <form class="form-horizontal" action="{{route('post-editar-url')}}" method="POST">
            {{ csrf_field() }}
            <h3>Endereço do perfil:</h3>
            <div class="form-group text-center{{ $errors->has('url_perfil') ? ' has-error' : '' }}">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <span style="font-size: 21px; color: #6CA7BF"><i>facilite.com/profiles/</i></span>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <input id="url_perfil" type="text" name="url_perfil" maxlength="25" value="@if(isset($urlProf)){{$urlProf}}@endif" class="form-control"/>
                @if ($errors->has('url_perfil'))
                  <span class="help-block">
                    <strong>{{ $errors->first('url_perfil') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <button disabled id="bt-salvar-url" type="submit" class="btn btn-success btn-sm pull-right disabled" style="display:none;">Editar</button>
          </form>
          {{-- //URL PERFIL --}}
        </div>
        <!-- //BLOCO CIDADE E URL PERFIL -->
      </div>
      <!-- //ROW -->

      <!-- DESCRIÇÃO -->
      <form class="form-horizontal" action="{{route('post-editar-descricao')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
          <div class="col-lg-12 col-md-12 top-5">
            <hr class="visible-xs">
            <h3>Descrição:</h3>
            <textarea id="description" name="description" class="form-control" maxlength="140" rows="3">@if(isset($descriptionProf)){{$descriptionProf}}@endif</textarea>
            @if ($errors->has('description'))
              <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <button disabled id="bt-salvar-descricao" type="submit" class="btn btn-success btn-sm pull-right disabled" style="display:none;">Editar</button>
      </form>
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
    <form class="form-horizontal" action="{{route('post-editar-perfil')}}" method="POST">
      {{ csrf_field() }}
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 top-5">
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-md">Atualizar dados</button>
          </div>
        </div>  
      </div>
    </form>
    <!-- //BOTÃO SUBMIT -->

  {{-- </form> --}}
  <!-- //FORMULÁRIO -->

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  <script src="{{ asset('js/show-hidden-buttons.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush