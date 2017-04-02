@inject('categorias', 'App\InjectCategorias')

<nav id="navbar" class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      {{-- Menu Hamburguer SM/XS --}}
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      {{-- Logo Facilite --}}
      <a id="logo" class="navbar-brand" href="{{ route('home') }}">
        Facilite Serviços
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">

      <ul id="navbar-menu" class="nav navbar-nav navbar-right text-center">

        {{-- Menu se for visitante --}}
        @if( Auth::guest() )
          <li><a id="navbar-entrar" href="{{ route('login') }}">ENTRAR</a></li>
          <li><a id="navbar-cadastrar" href="{{ route('cadastrar') }}">CADASTRAR</a></li>


        {{-- Menu se for prof --}}
        @elseif( Auth::user()->role == 'prof' )
          @include('layouts.includes.navbar-menu-prof')
        
        {{-- Menu se for user --}}
        @else
          @include('layouts.includes.navbar-menu-user')
        @endif
        
      </ul>
      
      {{-- NavBar Categorias --}}
      <ul id="navbar-categorias" class="nav navbar-nav text-center text-uppercase">
        {{-- Service Injection das Categorias do NavBar --}}
        @forelse( $categorias->injectCategorias() as $categoria )

        <li class="dropdown">
          <a href="{{ url("/categorias/$categoria->url") }}" class="dropdown" aria-haspopup="true" aria-expanded="false">{{ $categoria->name }}</a>
          <div class="hidden-xs">
            <ul class="dropdown-menu text-capitalize">
              @forelse( $categoria->servicos as $servico)
                <li>
                  <a href="{{ url("/categorias/$categoria->url/$servico->url ") }}">{{ $servico->name }} </a>
                </li>
              @empty
                <p>Não foi possível carregar os serviços...</p>
              @endforelse
            </ul>
          </div>
        </li>
        @empty
          <h4>Não foi possível carregar as categorias...</h4>
        @endforelse
      
      </ul>

    </div>
</nav>