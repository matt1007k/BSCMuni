@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <a href="{{route('objetivos.index')}}" class="btn btn-secondary">
            <- Regresar
        </a>
        <div class="card">                
            <div class="card-header h3">Asignar estrategias al objetivo: {{$objetivo->contenido}}</div>
            <div class="card-body "> 
                
                
                <form action="{{route('asignar', $objetivo->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col m12">
                            @error('estrategias')
                                <span class="w-100 z4 mb-4 alert alert-danger">{{ $message }}</span>
                            @enderror
                            <ul class="list-group">
                                @foreach ($estrategias as $estrategia)
                                    <li class="list-group-item">
                                        <label>
                                            <input type="checkbox" name="estrategias[]" value="{{$estrategia->id}}"
                                                @foreach($objetivo->estrategias as $estrategia_objectivo)
                                            {{$estrategia_objectivo->id == $estrategia->id ? 'checked' : ''}}
                                            @endforeach />
                                            <span>{{$estrategia->contenido}}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
               

                </form>
            </div>
        </div>

    </div>
</div>
@endsection