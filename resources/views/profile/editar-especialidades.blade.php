@extends('layouts.master-fluid')

@section('title') Editar Serviços - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')

  <h2>Selecione as especialidades:</h2>
  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">&raquo; {{ $error }}</h4> @endforeach @endif</span>
  <hr>

  <div class="row">
    {{-- FORM --}}
    <form class="form-horizontal" action="{{route('post-editar-especialidades')}}" method="POST">
      {{ csrf_field() }}

      {{-- BLOCO PRINCIPAL --}}
      <div class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-12">
        {{-- ROW --}}
        <div class="row">
          @forelse($servicos as $servico)
            {{-- PAINEL ESPECIALIDADES --}}
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <h3>{{$servico->name}}</h3>
              <div class="panel panel-default">
                <div class="panel-body">
                  @forelse($servico->especialidades as $especialidade)
                    <div class="checkbox">
                      <label for="check_{{$especialidade->id}}">
                        <input type="checkbox" id="check_{{$especialidade->id}}" name="check_{{$especialidade->id}}" value="{{$especialidade->id}}"

                          @forelse($profEspecialidades as $profEspecialidade)
                            @if( isset($profEspecialidades) && $profEspecialidade->id == $especialidade->id )
                              checked
                            @endif
                          @empty
                          @endforelse

                        />
                        {{$especialidade->name}}
                    </div>
                  @empty
                    <span>Erro interno, tente novamente mais tarde...</span>
                  @endforelse
                </div>
              </div>
            </div>
            {{-- //PAINEL ESPECIALIDADES --}}
          @empty
            <h1>Não foi possível carregar o conteúdo da página...</h1>
          @endforelse
        </div>
        {{-- //ROW --}}
      </div>
      {{-- //BLOCO PRINCIPAL --}}

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