@extends('layouts.master')

@section('title') Login - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
    <div class="row">
    <!-- LOGIN -->
    <div class="col-lg-6 col-md-6 border-right">
      <h2 class="text-center">Entrar</h2>

      <form class="form-horizontal" role="form" method="POST" action="{{ route('postLogin') }}">
        {{ csrf_field() }}

        <div class="form-group @if (count($errors) > 0) has-error @endif">
          <label for="email" class="col-md-2 control-label">Email:</label>
          <div class="col-md-9">
            <input id="email" type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com" value="{{ old('email') }}" autofocus/>
          </div>
        </div>

        <div class="form-group @if (count($errors) > 0) has-error @endif">
          <label for="password" class="col-md-2 control-label">Senha:</label>
          <div class="col-md-9">
            <input id="password" type="password" class="form-control" name="password" placeholder="*****************"/>

            @if (count($errors) > 0)
              @foreach ($errors->all() as $error)
                <span class="help-block text-center">
                  <strong class="text-danger">{!! $error !!}</strong>
                </span>
              @endforeach
            @endif

          </div>
        </div>
        

        <div class="form-group">
          <div class="col-md-offset-3 col-md-8">
            {{-- <div class="pull-left">
              <label for="remember">
                <input name="remember" type="checkbox"/> Me lembre
              </label>
            </div> --}}
            <div class="pull-right">
              <label>
                <a class="btn btn-link" href="#">
                  Esqueceu sua senha?
                </a>
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Entrar</button>
          </div>
        </div>

      </form>
    </div>

    <!-- CADASTRAR -->
    <div class="top-12 visible-xs"></div>
    <div class="col-lg-6 col-md-6 text-center">
      <h2>Ainda não é cadastrado?</h2>
      <p>Clique no botão abaixo e faça o seu cadastro agora mesmo!</p>
      <p><a class="btn btn-primary btn-lg" href="{{route('cadastrar')}}" role="button">Cadastrar agora &raquo;</a></p>
    </div>
    <!-- //CADASTRAR -->

  </div>
@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection
