@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title">
            Mapa Estratégico
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('perspectivas.index') }}">
                        Objetivos Estratégico
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('indicadores.index') }}">
                        Indicadores
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if (count($perspectivas) > 0)
                    <mapa-estrategico :datos='@json($perspectivas)' />
                    @else
                    <h4 class="text-bold">No hay relaciones!!!</h4>
                    @endif
                </div>
            </div>

        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="h3 mb-3 font-weight-bold text-dark text-uppercase">
                    Registrar relación de objetivos
                </div>
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
                                <button type="submit" class="btn btn-success">Guardar</button>
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

@endsection