@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col s6 offset-s3">
            <div class="card">  
                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                        <div class="card-title">{{ __('Iniciar sesion') }}</div>
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label for="email">Correo electronico</label>
                                @if ($errors->has('email'))
                                    <span class="helper-text" data-error="{{ $errors->first('email') }}">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" value="{{ old('password') }}" required autocomplete="password">
                                <label for="password">Contrasena</label>
                                @if ($errors->has('password'))
                                    <span class="helper-text" data-error="{{ $errors->first('password') }}">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                    <span>Recordarme</span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-cyan">
                                    Iniciar sesion
                                </button>
                                @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                    </form>       
                </div>
            </div>
        </div>
   
</div>
@endsection
