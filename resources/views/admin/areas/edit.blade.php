@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('actividades.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> cadena de valor
            </a>
            <div class="card">                
                <div class="card-content ">                            
                    
                    <div class="card-title">Modificar área</div>
                    <form action="{{route('areas.update', $area->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="input-field">
                                <input type="text" name="titulo" id="titulo" class="valitates" value="{{$area->titulo}}">
                                <label for="titulo">Titulo del área</label>
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