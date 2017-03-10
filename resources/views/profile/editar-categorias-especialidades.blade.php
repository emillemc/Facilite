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
      
      <!-- BLOCO C -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        @forelse($categorias as $categoria)
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
        @endforelse

      </div>
      <!-- //BLOCO CA -->

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
