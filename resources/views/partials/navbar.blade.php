<nav class="red darken-1">
    <div class="container">
        <div class="nav-wrapper">
            @guest
                <a href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
            @else
                <a href="{{ url('/home') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
            @endguest  
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                @guest
                    <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Crear cuenta</a></li>
                    @endif
                @else
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                        >Cerrar sesion</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest                            
            </ul>
        </div>
    </div>
    
</nav>