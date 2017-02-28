@extends('layouts.master')

@section('title') Facilite Serviços - Cadastro @endsection

@section('navbar')
    @include('autenticacao.includes.header')
@endsection

@section('content')
    <div class="row">
        <!-- CADASTRO -->
        <div class="col-lg-6 col-md-6">
          <h2 class="text-center">Cadastrar</h2>
          <form id="form_prof" class="form-horizontal" action="{{ route('postCadastrar') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="form-group">
              <div class="col-md-offset-2 col-md-9">

                <div class="checkbox">
                  <label for="is_prof"><input type="checkbox" id="is_prof" name="is_prof"/> Sou profissional</label>
                </div>

              </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-2 control-label">Nome:</label>
              <div class="col-md-9">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="50" placeholder="Ex.: Maria José" autofocus/>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-2 control-label">Email:</label>
              <div class="col-md-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group" id="formCpf" style="display: none">
              <label for="inputCpfCnpj" class="col-md-2 control-label">Cpf:</label>
              <div class="col-md-9">
                <input required disabled type="text" class="form-control" id="inputCpfCnpj" name="inputCpfCnpj" maxlength="14" placeholder="000.000.000-00"/>
              </div>
            </div>

            <div class="form-group" id="formTel" style="display: none">
              <label for="inputTel" class="col-md-2 control-label">Tel:</label>
              <div class="col-md-9">
                <input required disabled type="tel" class="form-control" id="inputTel" name="inputTel" maxlength="15" placeholder="(00) 00000-0000"/>
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-2 control-label">Senha:</label>
              <div class="col-md-9">
                <input id="password" type="password" class="form-control" name="password" maxlength="50" placeholder="*****************"/>

                

              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password_confirmation" class="col-md-2 control-label">Confirmar senha:</label>
              <div class="col-md-9">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" maxlength="50" placeholder="*****************"/>
                
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

              </div>
            </div>

            <div class="form-group">
              <div class="text-center">
                <button id="btnSubmit" type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
              </div>
            </div>
            
          </form>
        </div>
        <!-- //CADASTRO -->

        <!-- LOGIN -->
        <div class="top-12 visible-xs"></div>
        <div class="col-lg-6 col-md-6 text-center">
          <h2>Já possui cadastro?</h2>
          <p><a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Entrar agora &raquo;</a></p>
        </div>
        <!-- //LOGIN -->
    </div>
@endsection

@section('footer')
    @include('autenticacao.includes.footer')
@endsection


@push('scripts')

    <!-- JQuery/JQuery Mask Plugins -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <!-- Eventos do Formulário-->
    <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>
    
@endpush