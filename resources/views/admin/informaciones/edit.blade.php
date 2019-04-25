@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('informaciones.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> informaciones
            </a>
            <div class="card">                
                <div class="card-content ">                           
                    
                    <div class="card-title">Modificar informacion</div>
                    <form action="{{route('informaciones.update', $informacion->id)}}" method="POST">
                        @csrf
                        @method('put')
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nombre" type="text" name="nombre" class="validate" value="{{$informacion->nombre}}">
                                <label for="nombre">Nombre</label>
                                @if ($errors->has('nombre'))
                                    <span class="helper-text" data-error="{{ $errors->first('nombre') }}">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <textarea name="mision" id="mision" class="materialize-textarea">{{$informacion->mision}}</textarea>
                                <label for="mision">Misión de la org.</label>
                                @if ($errors->has('mision'))
                                    <span class="helper-text" data-error="{{ $errors->first('mision') }}">{{ $errors->first('mision') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <textarea name="vision" id="vision" class="materialize-textarea">{{$informacion->vision}}</textarea>
                                <label for="vision">Visión de la org.</label>
                                @if ($errors->has('vision'))
                                    <span class="helper-text" data-error="{{ $errors->first('vision') }}">{{ $errors->first('vision') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <textarea name="macroproceso" id="macroproceso" class="materialize-textarea">{{$informacion->macroproceso}}</textarea>
                                <label for="macroproceso">Macroproceso de la org.</label>
                                @if ($errors->has('macroproceso'))
                                    <span class="helper-text" data-error="{{ $errors->first('macroproceso') }}">{{ $errors->first('macroproceso') }}</span>
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