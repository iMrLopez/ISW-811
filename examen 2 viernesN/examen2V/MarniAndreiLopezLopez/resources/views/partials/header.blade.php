<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('helado.index') }}">Helados</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      @auth
      <li class="nav-item">
        <a href="{{ route('caracteristica.index') }}" class="nav-link">Características</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('helado.pdf') }}" class="nav-link">PDF Helados</a>
      </li>
      @endauth
      @can ('crearH')
      <li class="nav-item">
        <a href="{{ route('helado.create') }}" class="nav-link">Nuevo Helado</a>
      </li>
      @endcan
      @can ('graficoH')
      <li class="nav-item">
        <a href="{{ route('helado.grafico') }}" class="nav-link">Grafico Helados</a>
      </li>
      @endcan
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
      <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
      <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
      @else
      <li class="nav-link">{{ Auth::user()->username}}</li>
      <li>
        <a class="nav-link" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
    @endguest
  </ul>
</div>
</nav>
