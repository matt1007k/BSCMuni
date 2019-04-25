@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('procesos.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> procesos
            </a>
            <div class="card">                
                <div class="card-content ">                            
                    
                    <div class="card-title">Nueva subproceso</div>
                    <form action="{{route('subprocesos.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col m12">
                                <select name="proceso_id" id="proceso_id">
                                    <option value="" disabled selected>Seleccionar proceso</option>
                                    @foreach ($procesos as $proceso)                            
                                        <option value="{{$proceso->id}}"
                                            >{{$proceso->titulo}}</option>
                                    @endforeach
                                    
                                </select for="area_id">
                                <label>Procesos existentes</label>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <input type="text" name="titulo" id="titulo" class="valitates">
                                <label for="titulo">Titulo del subproceso</label>
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