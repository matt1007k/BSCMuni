@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('actividades.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> cadena de valor
            </a>
            <div class="card">                
                <div class="card-content ">                           
                    
                    <div class="card-title">Modificar actividad</div>
                    <form action="{{route('actividades.update', $actividad->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="input-field col m12">                                
                                <select name="area_id" id="area_id">
                                    <option value="" disabled selected>Seleccionar área</option>
                                    @foreach ($areas as $area)                            
                                        <option value="{{$area->id}}"
                                            {{$actividad->area_id === $area->id ? 'selected' : '' }}
                                            >{{$area->titulo}}</option>
                                    @endforeach
                                    
                                </select for="area_id">
                                <label>Areas existentes</label>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <textarea name="titulo" id="titulo" class="materialize-textarea">{{$actividad->titulo}}</textarea>
                                <label for="titulo">Titulo de la actividad</label>
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