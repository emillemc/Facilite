{{-- Links Mensagens Privadas --}}
<li><a id="message-link" style="font-size: 16px;" href="{{route('mensagens')}}" title="Mensagens"><span id="message-icon" class="glyphicon glyphicon-inbox"></span>&nbsp;Mensagens</a></li>

{{-- Menu Dropdown --}}
<li class="dropdown">
  <a style="padding: 5px 1px 0px 1px; font-size: 16px;" id="menu-user" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    @if(Auth::user()->isProfessional != null)
       <img src="/uploads/avatars/{{ Auth::user()->isProfessional->avatar }}" class="img-circle" style="width:40px; height:40px;">
    @endif
    {{ Auth::user()->name }} <span class="caret"></span>
  </a>

  <ul id="dropdown-menu-user" class="dropdown-menu" role="menu">
    <li>
      <a style="padding: 5px 10px 10px 20px;" href="{{ route('my-profile') }}">
        <span class="glyphicon glyphicon-user"></span> Meu perfil
      </a>
    </li>
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('editar-categorias') }}">
        <span class="glyphicon glyphicon-th-large"></span> Editar categorias
      </a>
    </li> 
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('editar-servicos') }}">
        <span class="glyphicon glyphicon-th-list"></span> Editar serviços
      </a>
    </li> 
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('editar-especialidades') }}">
        <span class="glyphicon glyphicon-th"></span> Editar especialidades
      </a>
    </li>
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('editar-perfil') }}">
        <span class="glyphicon glyphicon-picture"></span> Editar perfil
      </a>
    </li>
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('editar-conta') }}">
        <span class="glyphicon glyphicon-cog"></span> Minha conta
      </a>
    </li>
    <li style="padding: 0px; margin: 0px;" class="divider"></li>
    <li>
      <a style="padding: 10px 10px 10px 20px;" href="{{ route('logout') }}"
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