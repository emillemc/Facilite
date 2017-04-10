<ul class="nav nav-sidebar">

  <li @if(Route::currentRouteName() == 'my-profile') class="active" @endif>
      <a href="{{ route('my-profile') }}">
        <span class="glyphicon glyphicon-user"></span> Meu Perfil
      </a>
  </li>

  <li @if(Route::currentRouteName() == 'editar-categorias') class="active" @endif>
    <a href="{{ route('editar-categorias') }}">
      <span class="glyphicon glyphicon-th-large"></span> Editar categorias
    </a>
  </li>

  <li @if(Route::currentRouteName() == 'editar-servicos') class="active" @endif>
    <a href="{{ route('editar-servicos') }}">
      <span class="glyphicon glyphicon-th-list"></span> Editar serviços
    </a>
  </li>

  <li @if(Route::currentRouteName() == 'editar-especialidades') class="active" @endif>
    <a href="{{ route('editar-especialidades') }}">
      <span class="glyphicon glyphicon-th"></span> Editar especialidades
    </a>
  </li>

  <li @if(Route::currentRouteName() == 'editar-perfil') class="active" @endif>
    <a href="{{ route('editar-perfil') }}">
      <span class="glyphicon glyphicon-picture"></span> Editar perfil
    </a>
  </li>

  <li @if(Route::currentRouteName() == 'editar-conta') class="active" @endif>
    <a href="{{ route('editar-conta') }}">
      <span class="glyphicon glyphicon-cog"></span> Editar Conta
    </a>
  </li>

</ul>


{{-- <div class="hidden-xs">
  <nav>
    <ul class="nav nav-pills nav-stacked">
      <li @if(Route::currentRouteName() == 'my-profile') class="active" @endif>
          <a href="{{ route('my-profile') }}" class="text-muted">
            <span class="glyphicon glyphicon-user"></span> Meu Perfil
          </a>
      </li>
      <li @if(Route::currentRouteName() == 'editar-categorias') class="active" @endif>
        <a href="{{ route('editar-categorias') }}" class="text-muted">
          <span class="glyphicon glyphicon-th-large"></span> Editar categorias
        </a>
      </li>
      <li @if(Route::currentRouteName() == 'editar-servicos') class="active" @endif>
        <a href="{{ route('editar-servicos') }}" class="text-muted">
          <span class="glyphicon glyphicon-th-list"></span> Editar serviços
        </a>
      </li>
      <li @if(Route::currentRouteName() == 'editar-especialidades') class="active" @endif>
        <a href="{{ route('editar-especialidades') }}" class="text-muted">
          <span class="glyphicon glyphicon-th"></span> Editar especialidades
        </a>
      </li>
      <li @if(Route::currentRouteName() == 'editar-perfil') class="active" @endif>
        <a href="{{ route('editar-perfil') }}" class="text-muted">
          <span class="glyphicon glyphicon-picture"></span> Editar perfil
        </a>
      </li>
      <li @if(Route::currentRouteName() == 'editar-conta') class="active" @endif>
        <a href="{{ route('editar-conta') }}" class="text-muted">
          <span class="glyphicon glyphicon-cog"></span> Editar Conta
        </a>
      </li>
    </ul>
  </nav>
</div> --}}