{{-- Links Mensagens Privadas --}}
{{-- <li><a href="#"><span class="glyphicon glyphicon-inbox"></span></a></li> --}}

{{-- Menu Dropdown --}}
<li class="dropdown">
  <a style="padding: 5px 1px 0px 1px;" id="menu-user" href="#" class="dropdown-toggle font-16" data-toggle="dropdown" role="button" aria-expanded="false">
    <img src="{{asset('img/perfil3.png')}}" alt="user-image">
    {{ Auth::user()->name }} <span class="caret"></span>
  </a>

  <ul id="dropdown-menu-user" class="dropdown-menu" role="menu">
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
