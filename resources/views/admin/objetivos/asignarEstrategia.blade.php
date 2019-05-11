@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m6 offset-m3">
        <a href="{{route('objetivos.index')}}" class="btn btn-small waves-effect waves-light green margin-small">
            <i class="material-icons left">arrow_back</i> objetivos estratégicos
        </a>
        <div class="card">
            <div class="card-content ">

                <div class="card-title">Asignar estrategias a : {{$objetivo->contenido}} </div>
                @if ($errors->has('estrategias'))
                <span class="helper-text red-text darken-2">{{ $errors->first('estrategias') }}</span>
                @endif
                <form action="{{route('asignar', $objetivo->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col m12">
                            <ul>
                                @foreach ($estrategias as $estrategia)
                                <div class="input-field col m12">
                                    <li>
                                        <label>
                                            <input type="checkbox" name="estrategias[]" value="{{$estrategia->id}}"
                                                @foreach($objetivo->estrategias as $estrategia_objectivo)
                                            {{$estrategia_objectivo->id == $estrategia->id ? 'checked' : ''}}
                                            @endforeach />
                                            <span>{{$estrategia->contenido}}</span>
                                        </label>
                                    </li>
                                </div>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <button type="submit" class="waves-effect waves-light btn">Asignar estrategias</button>
            </div>

            </form>
        </div>
    </div>

</div>
</div>
@endsection