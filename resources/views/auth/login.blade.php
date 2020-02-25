@extends('layouts.auth')

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auto-form-wrapper">
        <div class="h2 text-center">{{ __('Iniciar sesión') }}</div>

        <form method="POST" class="py-3" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>

                <div class="input-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-email-outline"></i>
                        </span>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password">{{ __('Contraseña') }}</label>

                <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-account-key-outline"></i>
                        </span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label" for="remember">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Recordarme') }}
                        <i class="input-helper"></i>
                    </label>
                </div>
            </div>

            <div class="form-group mb-0 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    {{ __('Ingresar') }}
                </button>

                @if (Route::has('register'))
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('No tengo una cuenta?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection