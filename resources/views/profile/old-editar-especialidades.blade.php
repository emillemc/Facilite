@extends('layouts.master-fluid')

@section('title') Editar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  <h2>Editar Categorias e Especialidades: </h2>
  {{-- <div class="page-header">
    <h2>Editar Categorias e Especialidades: </h2>
  </div> --}}
  {{-- <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">{{ $error }}</h4> @endforeach @endif</span> --}}
  <hr style="margin-bottom: 50px;">

  <div class="row">
    <!-- FORM -->
    <form action="{{route('post-editar-especialidades')}}" method="POST">
      
      {{ csrf_field() }}
      
      {{-- BLOCO PRINCIPAL --}}
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @forelse($categorias as $categoria)
          {{-- PAINEL CATEGORIAS --}}
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading_{{$categoria->id}}">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne_{{$categoria->id}}" aria-expanded="false" aria-controls="collapseOne_{{$categoria->id}}">
                  <div class="checkbox">
                    <label for="check_{{$categoria->id}}">
                      <input type="checkbox" id="check_{{$categoria->id}}" value="{{$categoria->id}}">{{$categoria->name}}
                    </label>
                  </div>
                </a>
              </h4>
            </div>
            <div id="collapseOne_{{$categoria->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                @forelse($categoria->servicos as $servico)
                  {{-- PAINEL SERVICOS --}}
                  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <h4>{{$servico->name}}:</h4>
                    <div class="panel panel-default">
                      <div class="panel-body">
                  @forelse($servico->especialidades as $especialidade)
                        {{-- CHECKBOX'S ESPECIALIDADES --}}
                        <div class="checkbox">
                          <label for="espec_{{$especialidade->id}}">
                            <input type="checkbox" id="espec_{{$especialidade->id}}" name="espec_{{$especialidade->id}}" value="{{$especialidade->id}}"/> 
                            {{$especialidade->name}}
                          </label>
                        </div>
                  @empty
                    <p>Não foi possível carregar as especialidades...</p>
                  @endforelse
                      </div>
                    </div>
                  </div>
                    {{-- //PAINEL SERVICO --}}
                @empty
                  <p>Não foi possível carregar os serviços...</p>
                @endforelse
              </div>
            </div>
          </div>
          {{-- //PAINEL CATEGORIA --}}
        @empty
          <p>Não foi possível carregar as especialidades...</p>
        @endforelse






        {{-- @forelse($categorias as $categoria)
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 border-test">
            <h3>{{$categoria->name}}</h3>

            @forelse($categoria->servicos as $servico)
              <h4>{{$servico->name}}:</h4>

              @forelse($servico->especialidades as $especialidade)

                <div class="checkbox">
                  <label for="espec_{{$especialidade->id}}"><input type="checkbox" id="espec_{{$especialidade->id}}" name="espec_{{$especialidade->id}}" value="{{$especialidade->id}}"/> {{$especialidade->name}}</label>
                </div>

              @empty
                <p>...</p>
              @endforelse

            @empty
              <p>...</p>
            @endforelse
          </div>

        @empty
          <p>...</p>
        @endforelse --}}
      </div>
      {{-- //BLOCO PRINCIPAL --}}

      <!-- BLOCO BOTÃO -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-6">
        <div class="col-md-5 col-sm-5 col-xs-4"></div>
        <div class="col-md-2 col-sm-2 col-xs-4">
          <div class="input-group">
            <input type="submit" class="btn btn-lg btn-success" value="Continuar">
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
