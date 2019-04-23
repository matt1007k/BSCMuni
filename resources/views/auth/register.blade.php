@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col s6 offset-s3">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-title">Crear una cuenta</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required autocomplete="name">
                                <label for="name">Nombre</label>
                                @if ($errors->has('name'))
                                    <span class="helper-text" data-error="{{ $errors->first('name') }}">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

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
                                <input id="password_confirmation" type="password" class="validate" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation">
                                <label for="password_confirmation">Repetir Contrasena</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="helper-text" data-error="{{ $errors->first('password_confirmation') }}">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn waves-effect waves-cyan">
                                    Registrarse
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
