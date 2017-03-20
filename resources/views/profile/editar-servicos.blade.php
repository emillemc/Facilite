@extends('layouts.master-fluid')

@section('title') Editar Serviços - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  <h2>Selecione os serviços: </h2>
  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">{{ $error }}</h4> @endforeach @endif</span>
  <hr>
    
  <div class="row">
    {{-- FORM --}}
    <form class="form-horizontal" action="{{route('post-editar-servicos')}}" method="POST">
      {{ csrf_field() }}
      
      @forelse($categorias as $categoria)

        {{-- BLOCO PRINCIPAL --}}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <h3>{{$categoria->name}}</h3>
          <hr>

          @forelse($categoria->servicos as $servico)
            {{-- BLOCO CHECKBOX's --}}
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check_{{$servico->id}}">
                    <input type="checkbox" id="check_{{$servico->id}}" name="check_{{$servico->id}}" value="{{$servico->id}}"

                      @forelse($profServicos as $profServico) 
                        @if( isset($profServicos) && $profServico->id == $servico->id ) 
                          checked 
                        @endif
                      @empty 
                      @endforelse
                      
                    />
                    {{$servico->name}}
                  </label>
                </div>
              </div>
            </div>
          @empty
            <h1>Não foi possível carregar o conteúdo...</h1>
          @endforelse

        </div>
        {{-- //BLOCO PRINCIPAL --}}

      @empty
        <h1>Não foi possível carregar o conteúdo...</h1>
      @endforelse

      {{-- BOTÃO SUBMIT --}}
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-8">
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-md">Continuar</button>
          </div>
        </div>  
      </div>

    </form>
    {{-- //FORM --}}
  </div>
  {{-- ROW --}}

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
@endpush