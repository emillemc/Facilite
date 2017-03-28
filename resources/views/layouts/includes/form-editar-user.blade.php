<form id="form_user" class="form-group" action="{{ route('post-editar-conta-user') }}" method="POST">
  {{-- {{ method_field('PUT') }} --}}
  {{ csrf_field() }}
  
  <div class="">
    <span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 18px; color: #272727"></span>
    <label id="label_role" for="role_edit" style="font-weight: normal; font-size: 18px;">
      <input type="checkbox" id="role_edit" name="role" style="display: none;"/> Sou profissional
    </label>
  </div>

  <div class="top-4 col-lg-12 col-md-12 col-sm-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name_edit">Nome:</label>
    <input id="name_edit" type="text" class="form-control" name="name" value="@if(isset($userName)){{$userName or old('name')}}@else{{$profName or old('name')}}@endif" maxlength="50" placeholder="Ex.: Maria José"/>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email_edit">Email:</label>
      <input id="email_edit" type="email" class="form-control" name="email" value="@if(isset($userEmail)){{old('email', $userEmail)}}@else{{old('email', $profEmail)}} @endif" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
      @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
  </div>
  
  @if(!isset($profCpf))
    <div class="col-lg-12 col-md-12 col-sm-12 form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="formCpf_edit" style="display: none">
      <label for="cpf_edit">Cpf:</label>
      <input disabled type="text" class="form-control" id="cpf_edit" name="cpf" value="@if(isset($profCpf)){{old('cpf', $profCpf)}}@else{{old('cpf', '')}}@endif" maxlength="14" placeholder="000.000.000-00"/>
      @if ($errors->has('cpf'))
          <span class="help-block">
              <strong>{{ $errors->first('cpf') }}</strong>
          </span>
      @endif
    </div>
  @endif
  
  @if(!isset($profCpf))
    <div class="col-lg-12 col-md-12 col-sm-12 form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel_edit" style="display: none">
      <label for="tel_edit">Tel:</label>
      <input disabled type="tel" class="form-control" id="tel_edit" name="tel" value="@if(isset($profTel)){{old('tel', $profTel)}}@else{{old('tel', '')}}@endif" maxlength="15" placeholder="(00) 00000-0000"/>
      @if ($errors->has('tel'))
          <span class="help-block">
              <strong>{{ $errors->first('tel') }}</strong>
          </span>
      @endif
    </div>
  @endif

  <div class="top-4 form-group">
    <div class="text-center">
      <button id="btnSubmit" type="submit" class="btn btn-primary btn-sm">Salvar alterações</button>
    </div>
  </div>
  
</form>