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
                    <div class="col m3 s12">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                              <span class="card-title">{{$perspectiva->titulo}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col m9 s12">
                        <div class="row">
                        @forelse ($perspectiva->objetivos as $objetivo)
                        
                            <div class="col l3 m6 s12">
                                <div class="card red darken-{{$objetivo->id}}">
                                    <div class="card-content white-text">
                                      <span class="title">{{$objetivo->slug}} - {{$objetivo->contenido}}</span>
                                    </div>
                                </div>
                            </div>
                        
                        @empty
                            <div class="col s12">
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
                <div class="row">
                    <div class="col s12">
                        <table>
                            <thead>
                                <th>Relación de objetivos segun perspectiva</th>
                            </thead>
                            <tbody>
                                @forelse ($relaciones as $key => $relacion)
                                    <tr>
                                        <td>
                                            <h6>{{$key + 1}} - {{$relacion->campos}}</h6> 
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