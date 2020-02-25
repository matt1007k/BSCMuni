@extends('layouts.auth')

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auto-form-wrapper">
        <div class="h2 text-center">{{ __('Crear una cuenta') }}</div>

        <form method="POST" class="py-3" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>

                <div class="input-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-account-outline"></i>
                        </span>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>

                <div class="input-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">
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
                        name="password" required autocomplete="new-password">
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
                <label for="password-confirm">{{ __('Repetir Contraseña') }}</label>

                <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="mdi mdi-account-key-outline"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-0 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    {{ __('Registrarse') }}
                </button>
                @if (Route::has('login'))
                <a class="btn btn-link" href="{{ route('login') }}">
                    {{ __('Ya tengo una cuenta?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection