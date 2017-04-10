<form id="form_prof" action="{{ route('post-editar-conta-prof') }}" method="POST">
  {{-- {{ method_field('PUT') }} --}}
  {{ csrf_field() }}
  
  <div class="form-group">
  	<span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 18px; color: #272727"></span>
    <label id="label_role" for="role_edit" style="font-weight: normal; font-size: 18px;">
    	<input type="checkbox" id="role_edit" name="role"

        @if( isset($prof->user->role) && $prof->user->role == 'prof' )
          checked
        @endif

				style="display: none;"
      /> Sou profissional
    </label>
  </div>

  <div class="top-4 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name_edit">Nome:</label>
    <input id="name_edit" type="text" class="form-control input-lg" name="name" value="@if(isset($user->name)){{$user->name or old('name')}}@else{{$prof->user->name or old('name')}}@endif" maxlength="50" placeholder="Ex.: Maria José"/>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email_edit">Email:</label>
    <input id="email_edit" type="email" class="form-control input-lg" name="email" value="@if(isset($user->email)){{old('email', $user->email)}}@else{{old('email', $prof->user->email)}} @endif" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
    @if ($errors->has('email'))
      <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel_edit" style="display: none">
    <label for="tel_edit">Tel:</label>
    <input disabled type="tel" class="form-control input-lg" id="tel_edit" name="tel" value="{{old('tel', $prof->tel)}}" maxlength="15" placeholder="(00) 00000-0000"/>
    @if ($errors->has('tel'))
        <span class="help-block">
            <strong>{{ $errors->first('tel') }}</strong>
        </span>
    @endif
  </div>
  
  <div class="">
    <a href="#!" data-toggle="modal" data-target="#modalAlterarSenha">Alterar senha</a><br>
    <a href="#!" data-toggle="modal" data-target="#modalExcluirConta">Excluir conta</a>
  </div>

  {{-- <div style="margin-top: 30px;" class="form-group">
    <div class="text-center">
      <button id="btnSubmit" type="submit" class="btn btn-success btn-sm">Atualizar dados</button>
    </div>
  </div> --}}

  <div class="form-group">
    <div class="text-center">
      <button style="box-shadow: 1px 2px 4px #797979" type="submit" class="btn-green-medium">ATUALIZAR DADOS</button>
    </div>
  </div>
  
</form>

@include('layouts.includes.modal-excluir-conta')

@include('layouts.includes.modal-alterar-senha')