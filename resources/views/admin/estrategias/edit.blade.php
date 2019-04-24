@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{url('/foda?tipo='.$tipo)}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> Matriz foda
            </a>
            <div class="card">                
                <div class="card-content ">   
                    <div class="card-title">Modificar estrategia {{$tipo}}</div>
                    <form action="{{route('estrategias.update', $estrategia->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <input type="hidden" value="{{$tipo}}" name="tipo"/>
                        <div class="row">
                            <div class="input-field col m4">
                                <textarea name="foda" id="foda" class="materialize-textarea">{{$estrategia->foda}}</textarea>
                                <label for="foda">Relación de FODA</label>
                                @if ($errors->has('foda'))
                                    <span class="helper-text" 
                                        data-error="{{ $errors->first('foda') }}">
                                        {{ $errors->first('foda') }}
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col m8">
                                <textarea name="contenido" id="contenido" class="materialize-textarea">{{$estrategia->contenido}}</textarea>
                                <label for="contenido">Contenido de la estrategia</label>
                                @if ($errors->has('contenido'))
                                    <span class="helper-text" 
                                        data-error="{{ $errors->first('contenido') }}">
                                        {{ $errors->first('contenido') }}
                                    </span>
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