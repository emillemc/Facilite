@extends('layouts.master')

@section('title') Cadastrar - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  <div class="row padding-top-2">
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
      <div class="panel panel-default shadow-1">
        <div class="panel-body">
          <h3 class="text-center cyan-third font-roboto">CADASTRAR</h3>
          <hr>

          <form id="form_cadastro" role="form" method="POST" action="{{ route('post-cadastrar') }}" style="padding: 0px 20px 20px 20px;">
            {{ csrf_field() }}

            <div class="form-group">
              <span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 16px;"></span>
              <label id="label_role" for="role" style="font-weight: normal; font-size: 16px;">
                <input type="checkbox" id="role" name="role" style="display: none;" {{old('role') ? 'checked="checked"': ''}}/>Sou profissional
              </label>
            </div>

            <div class="form-group">
              <label for="name" class="control-label cor-default">Nome:</label>
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="50" placeholder="Ex.: Maria José" autofocus/>
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group">
              <label for="email" class="control-label cor-default">Email:</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="255" placeholder="Ex.: josemaria@gmail.com"/>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group" id="formCpf" style="display: none">
              <label for="cpf" class="control-label cor-default">Cpf:</label>
              <input disabled type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}" maxlength="14" placeholder="000.000.000-00"/>
              @if ($errors->has('cpf'))
                  <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('cpf') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group" id="formTel" style="display: none">
              <label for="tel" class="control-label cor-default">Tel:</label>
              <input disabled type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel') }}" maxlength="15" placeholder="(00) 00000-0000"/>
              @if ($errors->has('tel'))
                  <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('tel') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password" class="control-label cor-default">Senha:</label>
              <input id="password" type="password" class="form-control" name="password" maxlength="255" placeholder="*****************"/>
            </div>

            <div class="form-group">
              <label for="password_confirmation" class="control-label cor-default">Confirmar senha:</label>
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" maxlength="255" placeholder="*****************"/>
              
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong class="text-danger">{{ $errors->first('password') }}</strong>
                  </span>
              @endif

            </div>

            <div class="form-group">
              <div class="text-center">
                <button type="submit" class="btn-green-large">CADASTRAR</button>
              </div>
            </div>

            <hr>
            <div class="form-group text-center">
              <h4>Já possui cadastro?</h4>
              <span><a style="padding-top: 13px;" class="btn btn-cyan-large" href="{{route('login')}}">FAZER LOGIN</a><span>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection


@push('scripts')
  {{-- JQuery/JQuery Mask Plugins --}}
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
  {{-- check-uncheck.js --}}
  <script src="{{ asset('js/check-uncheck.js') }}"></script>
   {{-- Eventos do Formulário --}}
  <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>

  {{-- JQuery Validation --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

  <script>
    $.validator.setDefaults({
      submitHandler: function(){
        $('$form_cadastro').submit();
      }
    });

    $().ready( function(){

      $('#form_cadastro').validate({
        errorClass: 'text-danger',
        errorElement: 'strong',
        rules:{

          name:{
            required: true,
            minlength: 4,
            maxlength: 50
          },

          email:{
            required: true,
            maxlength: 255,
            email: true
          },

          cpf:{
            required: true,
            minlength: 14,
            maxlength: 14,
          },

          tel:{
            required: true,
            minlength: 15,
            maxlength: 15,
          },

          password:{
            required: true,
            minlength: 6
          },

          password_confirmation:{
            required: true,
            minlength: 6,
            equalTo: "#password"
          },

        },

        messages:{

          name:{
            required: "Informe um nome.",
            minlength: "Mínimo de 4 caracteres permitidos.",
            maxlength: "Máximo de 50 caracteres permitidos"
          },

          email:{
            required: "Informe um email.",
            maxlength: "Seu email parece grande demais...",
            email: "Informe um endereço de email válido."
          },

          cpf:{
            required: "Informe o seu CPF.",
            minlength: "Mínimo de 11 caracteres permitidos.",
            maxlength: "Máximo de 11 caracteres permitidos.",
          },

          tel:{
            required: "Informe o seu telefone.",
            minlength: "Mínimo de 11 caracteres permitidos.",
            maxlength: "Máximo de 11 caracteres permitidos.",
          },

          password:{
            required: "Informe uma senha.",
            minlength: "A senha deve ter no mínimo 6 caracteres."
          },

          password_confirmation:{
            required: "Informe novamente a senha.",
            minlength: "A confirmação de senha deve ter no mínimo 6 caracteres.",
            equalTo: "A confirmação de senha não confere."
          }

        }

      }); 
    });
  </script>

@endpush