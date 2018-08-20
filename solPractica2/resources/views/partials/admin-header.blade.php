<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('prop.index') }}">Propiedades</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      @auth
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link">Gestión Propiedades</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('rasgo.index') }}" class="nav-link">Rasgos</a>
        </li>
      @endauth

    @can ('nueva-propiedad')
      <li class="nav-item">
        <a href="{{ route('admin.create') }}" class="nav-link">Nueva Propiedad</a>
      </li>
    @endcan
    @can ('grafico-propiedades')
      <li class="nav-item">
        <a href="{{ route('admin.grafico') }}" class="nav-link">Grafico Propiedades</a>
      </li>
    @endcan
    @can ('pdf-propiedades')
      <li class="nav-item">
        <a href="{{ route('admin.pdf') }}" class="nav-link">PDF Propiedades</a>
      </li>
    @endcan
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
      @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </div>
</nav>