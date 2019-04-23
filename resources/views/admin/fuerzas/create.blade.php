@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('factores.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> 5 fuerzas de porter
            </a>
            <div class="card">                
                <div class="card-content ">                            
                    
                    <div class="card-title">Nueva fuerza</div>
                    <form action="{{route('fuerzas.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field">
                                <input type="text" name="titulo" id="titulo" class="valitates">
                                <label for="titulo">Titulo de la fuerza</label>
                                @if ($errors->has('titulo'))
                                    <span class="helper-text" data-error="{{ $errors->first('titulo') }}">{{ $errors->first('titulo') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <button type="submit" class="waves-effect waves-light btn">Guardar</button>
                    </form>
                </div>
            </div>
            
        </div>        
    </div>
@endsection