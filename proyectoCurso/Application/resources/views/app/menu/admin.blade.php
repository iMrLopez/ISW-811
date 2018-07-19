<ul class="nav">
  <!-- Menu - Inicio -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('app.main')}}">
      <i class="nc-icon nc-chart-pie-35"></i>
      <p>Inicio</p>
    </a>
  </li>
  <!-- Menu - Gestion de Centros de Acopio -->
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
      <i class="nc-icon nc-app"></i>
      <p>Centros de Acopio<b class="caret"></b>
      </p>
    </a>
    <div class="collapse " id="componentsExamples">
      <ul class="nav">
        <li class="nav-item ">
          <a class="nav-link" href="{{route('CRUD.collCenter.index')}}">
            <span class="sidebar-mini">L</span>
            <span class="sidebar-normal">Listado</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('CRUD.collCenter.create')}}">
            <span class="sidebar-mini">A</span>
            <span class="sidebar-normal">Agregar</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- Menu - Gestion de materiales -->
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#formsExamples">
      <i class="nc-icon nc-notes"></i>
      <p>Tipos de Materiales<b class="caret"></b>
      </p>
    </a>
    <div class="collapse " id="formsExamples">
      <ul class="nav">
        <li class="nav-item ">
          <a class="nav-link" href="{{route('CRUD.MaterialReciclable.index')}}">
            <span class="sidebar-mini">L</span>
            <span class="sidebar-normal">Listado</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('CRUD.MaterialReciclable.create')}}">
            <span class="sidebar-mini">A</span>
            <span class="sidebar-normal">Agregar</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- Menu - Gestion de Cupones -->
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#cc">
      <i class="nc-icon nc-paper-2"></i>
      <p>Cupones de canje<b class="caret"></b></p>
    </a>
    <div class="collapse " id="cc">
      <ul class="nav">
        <li class="nav-item ">
          <a class="nav-link" href="{{route('CRUD.CuponesDeCanje.index')}}">
            <span class="sidebar-mini">L</span>
            <span class="sidebar-normal">Listado</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('CRUD.CuponesDeCanje.create')}}">
            <span class="sidebar-mini">C</span>
            <span class="sidebar-normal">Creacion</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- Menu - Gestion de Usuarios -->
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
      <i class="nc-icon nc-single-02"></i>
      <p>Usuarios<b class="caret"></b></p>
    </a>
    <div class="collapse " id="tablesExamples">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#collectionUsers">
            <p>Clientes<b class="caret"></b></p>
          </a>
          <div class="collapse " id="collectionUsers">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('CRUD.GestionDeUsuarios.list')}}">
                  <span class="sidebar-mini">L</span>
                  <span class="sidebar-normal">Listado de Clientes</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#clientUsers">
            <p>Centros recoleccion<b class="caret"></b></p>
          </a>
          <div class="collapse " id="clientUsers">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('CRUD.GestionDeUsuarios.list',array('role'=>'collection'))}}">
                  <span class="sidebar-mini">L</span>
                  <span class="sidebar-normal">Listado</span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{route('CRUD.GestionDeUsuarios.create',array('role'=>'collection'))}}">
                  <span class="sidebar-mini">C</span>
                  <span class="sidebar-normal">Crear</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </li>
</ul>
</div>
</div>
