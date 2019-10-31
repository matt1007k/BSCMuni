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
                        <mapa-estrategico :datos='@json($perspectivas)' />
                        @else
                        <h4 class="text-bold">No hay relaciones!!!</h4>
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
                                    <label for="objetivo_id">Seleccionar objetivo</label>
                                    <select id="objetivo_id" name="objetivo_id"
                                        class="form-control @error('objetivo_id') is-invalid @enderror">
                                        <option disabled selected>Selecionar objetivo</option>
                                        @forelse ($objetivos as $objetivo)
                                        <option value="{{$objetivo->id}}">{{$objetivo->slug}} {{$objetivo->content}}
                                        </option>
                                        @empty
                                        <option>No tienes objetivos</option>
                                        @endforelse
                                    </select>
                                    @error('objetivo_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="relacion">Ingrese la relacion</label>
                                    <select id="relacion" name="relacion"
                                        class="form-control @error('relacion') is-invalid @enderror">
                                        <option disabled selected>Selecionar relacion</option>
                                        @forelse ($objetivos as $objetivo)
                                        <option value="{{$objetivo->slug}}">{{$objetivo->slug}} {{$objetivo->content}}
                                        </option>
                                        @empty
                                        <option>No tienes objetivos</option>
                                        @endforelse
                                    </select>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection