@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m6 offset-m3">
        <a href="{{route('objetivos.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
            <i class="material-icons left">arrow_back</i> objetivos estratégicos
        </a>
        <div class="card">
            <div class="card-content ">

                <div class="card-title">Modificar objetivo</div>
                <form action="{{route('objetivos.update', $objetivo->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="input-field col m12">
                            <select name="perspectiva_id" id="perspectiva_id">
                                <option value="" disabled selected>Seleccionar perspectiva</option>
                                @foreach ($perspectivas as $perspectiva)
                                <option value="{{$perspectiva->id}}"
                                    {{$objetivo->perspectiva_id === $perspectiva->id ? 'selected' : '' }}>
                                    {{$perspectiva->titulo}}</option>
                                @endforeach

                            </select for="perspectiva_id">
                            <label>Perspectivas existentes</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m12">
                            <textarea name="contenido" id="contenido"
                                class="materialize-textarea">{{$objetivo->contenido}}</textarea>
                            <label for="contenido">Contenido del objetivo</label>
                            @if ($errors->has('contenido'))
                            <span class="helper-text red-text darken-2">{{ $errors->first('contenido') }}</span>
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