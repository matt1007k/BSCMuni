@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-center">
                            <div class="card-title h3">Mapa Estratégico</div>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($perspectivas) > 0)
                        @foreach ($perspectivas as $perspectiva)
                        <div class="col-md-3 col-sm-12">
                            <div class="card bg-secondary mb-2">
                                <div class="card-body text-white">
                                  <span class="card-title">{{$perspectiva->titulo}}</span>:
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12">
                            <div class="row">
                            @forelse ($perspectiva->objetivos as $objetivo)
                            
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card bg-primary">
                                        <div class="card-body text-white">
                                          <span class="title">{{$objetivo->slug}} - {{$objetivo->contenido}}</span>
                                        </div>
                                    </div>
                                </div>
                            
                            @empty
                                <div class="col-sm-12">
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
                <div class="card-body">
                    <div class="w-100 text-center">
                        <span class="card-header h3">Relación de objetivos estrategicos</span>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 col-sm-12">
                            <table class="table">
                                <thead>
                                    <th>Relaciones</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse ($relaciones as $key => $relacion)
                                        <tr>
                                            <td class="w-30" style="width: 80%"><h6>{{$key + 1}} - {{$relacion->campos}}</h6> </td>
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
    </div>
</div>
    
@endsection
