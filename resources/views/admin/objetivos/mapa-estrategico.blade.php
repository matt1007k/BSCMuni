@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title h3">Mapa Estratégico</div>
                        </div>
                    </div>
                    <div class="row">
                        @if (count($perspectivas) > 0)
                            @foreach ($perspectivas as $perspectiva)
                            <div class="col-md-12 col-sm-12">
                                <div class="card bg-dark mb-2">
                                    <div class="card-body text-white">
                                    <span class="card-title">{{$perspectiva->titulo}}</span>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                @forelse ($perspectiva->objetivos as $objetivo)
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="card bg-primary mb-2 mt-2">
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
            <div class="card border-dark mb-4">
                <div class="card-header h4 bg-dark text-white text-center">
                    Relación de objetivos estrategicos
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6 col-sm-12">
                            <form action="{{route('mapas.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="relacion">Ingrese la relacion</label>
                                    <textarea name="relacion" id="relacion" class="form-control @error('relacion') is-invalid @enderror">{{ old('relacion') }}</textarea>
                                    @error('relacion')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary text-uppercase">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Relaciones</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse ($relaciones as $key => $relacion)
                                        <tr>
                                            <td style="width: 70%"><h6 class="no-margin">{{$key + 1}} - {{$relacion->campos}}</h6> </td>
                                            <td class="d-flex">
                                                {{-- <button id="editar" class="btn">editar</button> --}}
                                                <form action="{{route('mapas.destroy', $relacion->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm text-uppercase">x Eliminar</button>
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
    </div>
</div>
    
@endsection