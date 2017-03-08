@extends('layouts.master-fluid')

@section('title') Editar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  
  <h2>Selecione os serviços: </h2>
  <span>@if ( count($errors) > 0 ) @foreach ($errors->all() as $error) <h4 class="text-danger">{{ $error }}</h4> @endforeach @endif</span>
  <hr style="margin-bottom: 50px;">
      <!-- FORMULÁRIO -->
      <form class="form-horizontal" action="#">
        
        <div class="col-lg-1 col-md-1"></div>

        <!-- BLOCO PRINCIPAL -->
        <div class="col-lg-10 col-md-10">
          
          {{-- @forelse($categorias as $categoria)
            <h3>$categoria</h3>
          @empty
          <h1>Não foi possível carregar os serviços...</h1>
        @endforelse --}}



          <!-- BLOCO 1 -->
          {{-- <div class="row">
            <h3>Moda e Beleza</h3>
            <hr class="linha-horizontal">
            <!-- BLOCO CHECKBOX's -->
            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkManicure">
                    <input type="checkbox" id="checkManicure" value="option1">Manicure
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkCabeleleiro">
                    <input type="checkbox" id="checkCabeleleiro" value="option2">Cabeleleiro
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkMaquiador">
                   <input type="checkbox" id="checkMaquiador" value="option3">Maquiador
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="checkEsteticista">
                    <input type="checkbox" id="checkEsteticista" value="option4">Esteticista
                </div>
              </div>
            </div>
            <!-- //BLOCO CHECKBOX's -->
          </div>
          <!-- //BLOCO 1 -->
          
          <!-- BLOCO 2 -->
          <div class="row top-5">
            <h3>Categoria 2</h3>
            <hr class="linha-horizontal">
            <!-- BLOCO CHECKBOX's -->
            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check1">
                    <input type="checkbox" id="check1" value="option1">Serviço 1
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check2">
                    <input type="checkbox" id="check2" value="option2">Serviço 2
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check3">
                   <input type="checkbox" id="check3" value="option3">Serviço 3
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check4">
                    <input type="checkbox" id="check4" value="option4">Serviço 4
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- //BLOCO 2 -->

          <!-- BLOCO 3 -->
          <div class="row top-5">
            <h3>Categoria 3</h3>
            <hr class="linha-horizontal">
            <!-- BLOCO CHECKBOX's -->
            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check11">
                    <input type="checkbox" id="check11" value="option11">Serviço 1
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check22">
                    <input type="checkbox" id="check22" value="option22">Serviço 2
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check33">
                   <input type="checkbox" id="check33" value="option33">Serviço 3
                  </label>
                </div>
              </div>
            </div>

            <div class="col-lg-offset-1 col-lg-2 col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-3 col-xs-offset-1 col-xs-5">
              <div class="form-group">
                <div class="checkbox">
                  <label class="checkbox-inline" for="check44">
                    <input type="checkbox" id="check44" value="option44">Serviço 4
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- //BLOCO 3 --> --}}

        </div>
        <!-- //BLOCO PRINCIPAL -->

        <div class="col-lg-1 col-md-1"></div>

        <!-- BOTÃO SUBMIT -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-8">
          <div class="form-group">
            <div class="text-center">
              <button type="submit" class="btn btn-success btn-md">Continuar</button>
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
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush