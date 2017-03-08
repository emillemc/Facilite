@inject('categorias', 'App\MenuCategorias')

<nav class="navbar navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <!-- Menu Hamburguer SM/XS -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Logo Facilite -->
      <a class="navbar-brand" href="{{ route('home') }}">
        {{ config('app.name', 'Facilite Serviços') }}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">

      {{-- NavBar lado direito --}}
      <ul class="nav navbar-nav navbar-right text-center">

        {{-- Menu se for visitante --}}
        @if( Auth::guest() )
          <li><a href="{{ route('login') }}">Entrar</a></li>
          <li><a href="{{ route('cadastrar') }}">Cadastrar</a></li>

        {{-- Menu se for prof --}}
        @elseif( Auth::user()->role == 'prof' )
          @include('layouts.includes.menu-prof');
        
        {{-- Menu se for user --}}
        @else
          @include('layouts.includes.menu-user');
        @endif
        
      </ul>

      <div>
        <ul class="nav navbar-nav">
          {{-- Service Injection das Categorias do NavBar --}}
          @forelse( $categorias->menuCategorias() as $categoria )

            <li class="dropdown">
            <a href="{{ url("/categoria/$categoria->url") }}" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $categoria->name }}</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="#">Serviço 1</a></li>
                <li><a href="#">Serviço 2</a></li>
                <li><a href="#">Serviço 3</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </div>
          </li>
          @empty
            <h4>Não foi possível carregar as categorias...</h4>
          @endforelse
        
        </ul>
      </div>
    </div>
</nav>