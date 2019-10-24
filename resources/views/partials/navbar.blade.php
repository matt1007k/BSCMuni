<nav class="navbar navbar-expand-lg navbar-light bg-light p-4 mb-2">
    <div class="container">

        @guest
            <a href="{{ url('/') }}" class="navbar-brand h4"><span class="text-primary">BSC</span>Tienda</a>
        @else    
            <a href="{{ url('/home') }}" class="navbar-brand h4"><span class="text-primary">BSC</span>Tienda</a>
        @endguest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link text-uppercase">Ingresar</a>
                    
                </li>
                {{-- @if (Route::has('register')) --}}
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-outline-info text-uppercase">Crear cuenta</a>
                </li>
                {{-- @endif --}}
                @else
                <li class="nav-item">
                    
                    <a href="{{ route('logout') }}"
                        class="btn btn-outline-danger text-uppercase"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Salir del sistema</a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
