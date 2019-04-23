@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('factores.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> 5 fuerzas de porter
            </a>
            <div class="card">                
                <div class="card-content ">                           
                    
                    <div class="card-title">Modificar factor</div>
                    <form action="{{route('factores.update', $factor->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="input-field col m12">                                
                                <select name="fuerza_id" id="fuerza_id">
                                    <option value="" disabled selected>Seleccionar una fuerza</option>
                                    @foreach ($fuerzas as $fuerza)                            
                                        <option value="{{$fuerza->id}}"
                                            {{$factor->fuerza_id === $fuerza->id ? 'selected' : '' }}
                                            >{{$fuerza->titulo}}</option>
                                    @endforeach
                                    
                                </select for="fuerza_id">
                                <label>Fuerzas existentes</label>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <textarea name="titulo" id="titulo" class="materialize-textarea">{{$factor->titulo}}</textarea>
                                <label for="titulo">Titulo del factor</label>
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