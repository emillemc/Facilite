<div class="hidden-xs">
  <nav>
    <ul class="nav nav-stacked">
      <li class="active">
          <a href="{{ route('my-profile') }}" class="text-muted">
            <span class="glyphicon glyphicon-user"></span> Meu Perfil
          </a>
        </li>
      <li>
          <a href="{{ route('editar-perfil') }}" class="text-muted">
            <span class="glyphicon glyphicon-picture"></span> Editar perfil
          </a>
        </li>
        <li>
          {{-- Link ativo page editar-categorias --}}
          <a href="{{ route('editar-categorias') }}" class="text-muted">
            <span class="glyphicon glyphicon-th-large"></span> Editar categorias
          </a>
        </li>
        <li>
          <a href="{{ route('editar-servicos') }}" class="text-muted">
            <span class="glyphicon glyphicon-th-list"></span> Editar serviços
          </a>
        </li>
        <li>
          <a href="{{ route('editar-especialidades') }}" class="text-muted">
            <span class="glyphicon glyphicon-th"></span> Editar especialidades
          </a>
        </li>
        <li>
          <a href="{{ route('editar-conta') }}" class="active">
            <span class="glyphicon glyphicon-cog"></span> Editar Conta
          </a>
        </li>
    </ul>
  </nav>
</div>