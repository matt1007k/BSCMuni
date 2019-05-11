@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col m6 offset-m3">
        <a href="{{route('objetivos.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
            <i class="material-icons left">arrow_back</i> objetivos estratégicos
        </a>
        <div class="card">
            <div class="card-content ">

                <div class="card-title">Modificar perspectiva</div>
                <form action="{{route('perspectivas.update', $perspectiva->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="input-field">
                            <input type="text" name="titulo" id="titulo" class="valitates"
                                value="{{$perspectiva->titulo}}">
                            <label for="titulo">Titulo de la perspectiva</label>
                            @if ($errors->has('titulo'))
                            <span class="helper-text red-text darken-2">{{ $errors->first('titulo') }}</span>
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