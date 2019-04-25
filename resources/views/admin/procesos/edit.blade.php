@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m6 offset-m3">
            <a href="{{route('procesos.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
                <i class="material-icons left">arrow_back</i> procesos
            </a>
            <div class="card">                
                <div class="card-content ">                           
                    
                    <div class="card-title">Modificar proceso</div>
                    <form action="{{route('procesos.update', $proceso->id)}}" method="POST">
                        @csrf
                        @method('put')
                        
                        <div class="row">
                            <div class="input-field col m12">
                                <textarea name="titulo" id="titulo" class="materialize-textarea">{{$proceso->titulo}}</textarea>
                                <label for="titulo">Titulo de la proceso</label>
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