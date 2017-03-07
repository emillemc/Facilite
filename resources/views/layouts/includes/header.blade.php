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

          <li class="dropdown">
            <a href="/moda-beleza" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Moda e Beleza</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="/para-voce/cabeleleiro">Cabeleleiro</a></li>
                <li><a href="/para-voce/depilacao">Depilação</a></li>
                <li><a href="/para-voce/manicure">Manicure</a></li>
                <li><a href="/para-voce/maquiador">Maquiador</a></li>
                <li><a href="/para-voce/esteticista">Esteticista</a></li>
              </ul>
            </div>
          </li>
          
          <li class="dropdown">
            <a href="/para-sua-casa" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Casa</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="/para-sua-casa/eletricista">Eletricista</a></li>
                <li><a href="/para-sua-casa/carpinteiro">Carpinteiro</a></li>
                <li><a href="/para-sua-casa/chaveiro">Chaveiro</a></li>
                <li><a href="/para-sua-casa/encanador">Encanador</a></li>
                <li><a href="/para-sua-casa/pedreiro">Pedreiro</a></li>
                <li><a href="/para-sua-casa/diarista">Diarista</a></li>
                <li><a href="/para-sua-casa/pintor">Pintor</a></li>
                <li><a href="/para-sua-casa/serralheiro">Serralheiro</a></li>
              </ul>
            </div>
          </li>

          <li class="dropdown">
            <a href="/transporte" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transporte</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="/transporte/motorista">Motorista</a></li>
                <li><a href="/transporte/motoboy">Motoboy</a></li>
                <li><a href="/transporte/lavagem">Lavagem</a></li>
              </ul>
            </div>
          </li>

          <li class="dropdown">
            <a href="/saude" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Saúde</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="/saude/enfermeiro">Enfermeiros</a></li>
                <li><a href="/saude/cuidador">Cuidadores</a></li>
                <li><a href="/saude/dentista">Dentistas</a></li>
              </ul>
            </div>
          </li>

          <li class="dropdown">
            <a href="/aulas" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Aulas</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="/aulas/danca">Danças</a></li>
                <li><a href="/aulas/esporte">Esportes</a></li>
                <li><a href="/aulas/musica">Música</a></li>
              </ul>
            </div>
          </li>

          <li class="dropdown">
            <a href="/eventos" class="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos</a>
            <div class="hidden-xs">
              <ul class="dropdown-menu">
                <li><a href="/eventos/churrasqueiro">Churrasqueiro</a></li>
                <li><a href="/eventos/dj">DJ</a></li>
                <li><a href="/eventos/fotografo">Fotógrafo</a></li>
              </ul>
            </div>
          </li>
        
        </ul>
      </div>
    </div>
</nav>