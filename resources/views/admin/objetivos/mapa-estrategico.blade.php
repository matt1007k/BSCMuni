@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="card">
            <div class="card-content ">
                <div class="row">
                    <div class="col m12 d-flex justify-center">
                        <div class="card-title">Mapa Estratégico</div>
                    </div>
                </div>
                <div class="row">
                    @if (count($perspectivas) > 0)
                    @foreach ($perspectivas as $perspectiva)
                    <div class="col m3">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                              <span class="card-title">{{$perspectiva->titulo}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col m9">
                        <div class="row">
                        @forelse ($perspectiva->objetivos as $objetivo)
                        
                            <div class="col m3 s12">
                                <div class="card red darken-{{$objetivo->id}}">
                                    <div class="card-content white-text">
                                      <span class="title">{{$objetivo->slug}} - {{$objetivo->contenido}}</span>
                                    </div>
                                </div>
                            </div>
                        
                        @empty
                            <div class="col m12">
                                <p>No tiene objetivos...</p>
                            </div>
                        @endforelse
                        </div>
                    </div>
                    @endforeach
                   
                    @else
                    <h4 class="text-bold">No hay ningún registro!!!</h4>
                    @endif
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-content">
                <span class="title">Relación de Objetivos</span>
                <div class="row mt-2">
                    <div class="col m6">
                        <form action="{{route('mapas.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea name="relacion" id="relacion" class="materialize-textarea" cols="30" rows="3"></textarea>
                                    <label for="relacion">Relación de objetivos</label>
                                    @if ($errors->has('relacion'))
                                    <span class="helper-text red-text darken-1">
                                        {{ $errors->first('relacion') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col m6">
                        <table>
                            <thead>
                                <th>Relación</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                @forelse ($relaciones as $relacion)
                                    <tr>
                                        <td>{{$relacion->campos}}</td>
                                        <td class="d-flex">
                                            {{-- <button id="editar" class="btn">editar</button> --}}
                                            <form action="{{route('mapas.destroy', $relacion->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn red">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No hay relaciones...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('scripts')
    <script>
        
    </script>
@endpush