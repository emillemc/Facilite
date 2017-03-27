<form id="form_prof" class="form-group" action="{{ route('post-editar-conta-prof') }}" method="POST">
  {{-- {{ method_field('PUT') }} --}}
  {{ csrf_field() }}
  
  <div class="col-md-offset-2 col-md-9">
  	<span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 18px; color: #272727"></span>
    <label id="label_role" for="role_edit" style="font-weight: normal; font-size: 18px;">
    	<input type="checkbox" id="role_edit" name="role"

        @if( isset($profRole) && $profRole == 'prof' )
          checked
        @endif

				style="display: none;"
      /> Sou profissional
    </label>
  </div>

  <div class="top-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name_edit" class="col-md-2 control-label">Nome:</label>
    <div class="col-md-9">
      <input id="name_edit" type="text" class="form-control" name="name" value="@if(isset($userName)){{$userName or old('name')}}@else{{$profName or old('name')}}@endif" maxlength="50" placeholder="Ex.: Maria José"/>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
  </div>

  <div class="top-4 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email_edit" class="col-md-2 control-label">Email:</label>
    <div class="col-md-9">
      <input id="email_edit" type="email" class="form-control" name="email" value="@if(isset($userEmail)){{old('email', $userEmail)}}@else{{old('email', $profEmail)}} @endif" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
      @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>
  </div>

  <div class="top-4 form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel_edit" style="display: none">
    <label for="tel_edit" class="col-md-2 control-label">Tel:</label>
    <div class="col-md-9">
      <input disabled type="tel" class="form-control" id="tel_edit" name="tel" value="{{old('tel', $profTel)}}" maxlength="15" placeholder="(00) 00000-0000"/>
      @if ($errors->has('tel'))
          <span class="help-block">
              <strong>{{ $errors->first('tel') }}</strong>
          </span>
      @endif
    </div>
  </div>

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