<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        @guest
        <a href="{{ url('/') }}" class="navbar-brand">BSC C&C RABATE S.R.L.</a>
        @else    
            <a href="{{ url('/home') }}" class="navbar-brand">BSC C&C RABATE S.R.L.</a>
        @endguest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Ingresar</a>
                    
                </li>
                {{-- @if (Route::has('register')) --}}
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                </li>
                {{-- @endif --}}
                @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="#navbarDropdown1">
                        <a href="{{ route('logout') }}"
                        class="dropdown-item"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Cerrar sesion</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
