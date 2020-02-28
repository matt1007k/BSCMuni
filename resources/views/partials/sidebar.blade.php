<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ route('informaciones.index') }}" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{ asset('/images/faces/face8.jpg') }}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">{{ Auth::user()->name }}</p>
          <p class="designation">{{ Auth::user()->email }}</p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Menú Principal</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('informaciones.index') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Información de la empresa</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('procesos.index') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Macroproceso</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('areas.index') }}">
        <i class="menu-icon typcn typcn-shopping-bag"></i>
        <span class="menu-title">Cadena de valor</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('fuerzas.index') }}">
        <i class="menu-icon typcn typcn-th-large-outline"></i>
        <span class="menu-title">5 Fuerzas de Porter</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('factor.interno') }}">
        <i class="menu-icon typcn typcn-bell"></i>
        <span class="menu-title">Factores Internos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('factor.externo') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Factores Externos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('fce.cm') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">FCE vs CM</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('estrategias.foda') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Estrategias Matriz FODA</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('proposiciones.index') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Proposición de Valor</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('objetivos.accion') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Visión en Acción</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('perspectivas.index') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Objetivos Estratégico</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('mapas.index') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Mapa Estratégico</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('indicadores.index') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Indicadores</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('datos.index') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Datos</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('maestro.index') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Maestro</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('maestro.resumen') }}">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Resumen</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/login.html"> Login </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/register.html"> Register </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
          </li>
        </ul>
      </div>
    </li> --}}
  </ul>
</nav>