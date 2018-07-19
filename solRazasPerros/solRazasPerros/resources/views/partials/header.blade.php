<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('rp.index') }}">Razas Perrros</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('rp.index') }}">Listado de razas de perros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('rp.temperamentos') }}">Temperamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('rp.tamanos') }}">Tamaños</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('o.acerca-de') }}">Acerca de</a>
      </li>
    </ul>
  </div>
</nav>
