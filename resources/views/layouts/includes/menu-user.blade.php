<nav>
	<ul class="nav nav-pills nav-stacked">
	    <li @if(Route::currentRouteName() == 'editar-conta') class="active" @endif>
	      <a href="{{ route('editar-conta') }}" class="text-muted">
	        <span class="glyphicon glyphicon-cog"></span> Editar Conta
	      </a>
	    </li>
	</ul>
</nav>