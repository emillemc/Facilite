@extends('layouts.master')

@section('title') Editar Conta - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
	
		{{-- Imagem e botão 'Mudar foto' --}}
	  <div class="text-center">
	  	<img src="{{ asset('img/perfil.png') }}" alt="img_perfil" class="img-circle">
			<div class="input-group center-block top-5">
				<label for="input-img">
					<a class="btn btn-primary btn-sm">Mudar foto</a>
				</label>
			</div>
	  	<input id="input-img" type="file"  accept="image/*" style="display: none;">
		</div>
    
    {{-- Nome User --}}
    <div class="text-center">
      <h4><b>{{$userName or $profName}}</b></h4>
      <hr>
    </div>
		
		{{-- Menu --}}
    <div class="hidden-xs">
    	<nav>
    		<ul class="nav nav-stacked">
    			<li>
			      <a href="{{ route('editar-perfil') }}">
			        <span class="glyphicon glyphicon-user"></span> Meu Perfil
			      </a>
			    </li>
    			<li>
			      <a href="{{ route('editar-perfil') }}">
			        <span class="glyphicon glyphicon-picture"></span> Editar perfil
			      </a>
			    </li>
			    <li>
			      <a href="{{ route('editar-perfil') }}">
			        <span class="glyphicon glyphicon-th-large"></span> Editar categorias
			      </a>
			    </li>
			    <li>
			      <a href="{{ route('editar-perfil') }}">
			        <span class="glyphicon glyphicon-th-list"></span> Editar serviços
			      </a>
			    </li>
			    <li>
			      <a href="{{ route('editar-perfil') }}">
			        <span class="glyphicon glyphicon-th"></span> Editar especialidades
			      </a>
			    </li>
			    <li>
			      <a href="{{ route('editar-perfil') }}">
			        <span class="glyphicon glyphicon-cog"></span> Editar Conta
			      </a>
			    </li>
    		</ul>
    	</nav>
    </div>
  </div>
	
	<div class="top-5 col-lg-7 col-md-7 col-sm-8 col-xs-12">
		
		<!-- CADASTRO -->
        <div class="form-horizontal">
          <form id="form_prof" class="form-group" action="{{ route('post-editar-conta') }}" method="POST">
            {{ csrf_field() }}
            
            <div class="col-md-offset-2 col-md-9">
            	<span id="check_span_role" name="check_span_role" class="glyphicon glyphicon-unchecked" style="font-size: 22px; color: #272727"></span>
              <label id="label_role" for="role" style="font-weight: normal; font-size: 22px;">
              	<input type="checkbox" id="role" name="role"

                  @if( isset($profRole) && $profRole == 'prof' )
                    checked
                  @endif

									style="display: none;"
                /> Sou profissional
              </label>
            </div>

            <div class="top-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-2 control-label">Nome:</label>
              <div class="col-md-9">
                <input id="name" type="text" class="form-control" name="name" value="@if(isset($userName)){{$userName or old('name')}} @else{{$profName or old('name')}} @endif" maxlength="50" placeholder="Ex.: Maria José"/>
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
                <input id="email" type="email" class="form-control" name="email" value="@if(isset($userEmail)){{$userEmail or old('email')}} @else{{$profEmail or old('email')}} @endif" maxlength="60" placeholder="Ex.: josemaria@gmail.com"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="top-4 form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="formCpf" style="display: none">
              <label for="cpf" class="col-md-2 control-label">Cpf:</label>
              <div class="col-md-9">
                <input disabled type="text" class="form-control" id="cpf" name="cpf" value="{{$profCpf or old('cpf')}}" maxlength="14" placeholder="000.000.000-00"/>
                @if ($errors->has('cpf'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="top-4 form-group{{ $errors->has('tel') ? ' has-error' : '' }}" id="formTel" style="display: none">
              <label for="tel" class="col-md-2 control-label">Tel:</label>
              <div class="col-md-9">
                <input disabled type="tel" class="form-control" id="tel" name="tel" value="{{$profTel or old('tel')}}" maxlength="15" placeholder="(00) 00000-0000"/>
                @if ($errors->has('tel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tel') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="top-4 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
            </div>

            <div class="top-4 form-group">
              <div class="text-center">
                <button id="btnSubmit" type="submit" class="btn btn-primary btn-sm">Salvar alterações</button>
              </div>
            </div>
            
          </form>
        </div>
        <!-- //CADASTRO -->

	</div>

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
	{{-- check-uncheck.js --}}
	<script src="{{ asset('js/check-uncheck.js') }}"></script>
  {{-- JQuery/JQuery Mask Plugins --}}
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
   {{-- Eventos do Formulário --}}
  <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script>
@endpush