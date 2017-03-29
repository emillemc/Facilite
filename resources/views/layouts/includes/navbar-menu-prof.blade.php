{{-- Links Mensagens Privadas --}}
<li><a href="#"><span class="glyphicon glyphicon-inbox"></span></a></li>

{{-- Menu Dropdown --}}
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    {{ Auth::user()->name }} <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" role="menu">
    <li>
      <a href="{{ route('my-profile') }}">
        <span class="glyphicon glyphicon-user"></span> Meu perfil
      </a>
    </li>
    <li class="divider"></li>
    <li>
      <a href="{{ route('editar-categorias') }}">
        <span class="glyphicon glyphicon-th-large"></span> Editar categorias
      </a>
    </li> 
    <li class="divider"></li>
    <li>
      <a href="{{ route('editar-servicos') }}">
        <span class="glyphicon glyphicon-th-list"></span> Editar serviços
      </a>
    </li> 
    <li class="divider"></li>
    <li>
      <a href="{{ route('editar-especialidades') }}">
        <span class="glyphicon glyphicon-th"></span> Editar especialidades
      </a>
    </li>
    <li class="divider"></li>
    <li>
      <a href="{{ route('editar-perfil') }}">
        <span class="glyphicon glyphicon-picture"></span> Editar perfil
      </a>
    </li>
    <li class="divider"></li>
    <li>
      <a href="{{ route('editar-conta') }}">
        <span class="glyphicon glyphicon-cog"></span> Editar conta
      </a>
    </li>
    <li class="divider"></li>
    <li>
      <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-log-out"></span> Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
</li>