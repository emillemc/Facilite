<form id="form_prof" class="form-group" action="{{ route('post-editar-conta-user') }}" method="POST">
  {{-- {{ method_field('PUT') }} --}}
  {{ csrf_field() }}
  
  <div class="col-md-offset-2 col-md-9">
  	<span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 18px; color: #272727"></span>
    <label id="label_role" for="role" style="font-weight: normal; font-size: 18px;">
    	<input type="checkbox" id="role" name="role" style="display: none;" {{old('role') ? 'checked="checked"': ''}}/> Sou profissional
    </label>
  </div>

  <div class="top-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nome:</label>
    <div class="col-md-9">
      <input id="name" type="text" class="form-control" name="name" value="@if(isset($userName)){{old('name', $userName)}}@else{{$profName or old('name')}}@endif" maxlength="50" placeholder="Ex.: Maria José"/>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
  </div>

  <div class="top-4 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email:</label>
    <div class="col-md-9">
      <input id="email" type="email" class="form-control" name="email" value="@if(isset($userEmail)){{old('email', $userEmail)}}@else{{$profEmail or old('email')}} @endif" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
  </div>
  
  @if(!isset($profCpf))
    <div class="top-4 form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="formCpf" style="display: none">
      <label for="cpf" class="col-md-2 control-label">Cpf:</label>
      <div class="col-md-9">
        <input disabled type="text" class="form-control" id="cpf" name="cpf" value="@if(isset($profCpf)){{old('cpf', $profCpf)}}@else{{old('cpf', '')}}@endif" maxlength="14" placeholder="000.000.000-00"/>
        @if ($errors->has('cpf'))
            <span class="help-block">
                <strong>{{ $errors->first('cpf') }}</strong>
            </span>
        @endif
      </div>
    </div>
  @endif
  
  @if(!isset($profCpf))
    <div class="top-4 form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel" style="display: none">
      <label for="tel" class="col-md-2 control-label">Tel:</label>
      <div class="col-md-9">
        <input disabled type="tel" class="form-control" id="tel" name="tel" value="@if(isset($profTel)){{old('tel', $profTel)}}@else{{old('tel', '')}}@endif" maxlength="15" placeholder="(00) 00000-0000"/>
        @if ($errors->has('tel'))
            <span class="help-block">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
        @endif
      </div>
    </div>
  @endif

  {{-- <div class="top-4 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Senha:</label>
    <div class="col-md-9">
      <input id="password" type="password" class="form-control" name="password" maxlength="50" placeholder="*****************"/>

      

    </div>
  </div>

  <div class="top-4 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password_confirmation" class="col-md-2 control-label">Confirmar senha:</label>
    <div class="col-md-9">
      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" maxlength="50" placeholder="*****************"/>
      
      @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif

    </div>
  </div> --}}

  <div class="top-4 form-group">
    <div class="text-center">
      <button id="btnSubmit" type="submit" class="btn btn-primary btn-sm">Salvar alterações</button>
    </div>
  </div>
  
</form>