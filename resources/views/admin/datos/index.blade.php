@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="row">
            <div class="col m12 d-flex justify-center align-items-center">
                <h5>Lista de datos de cada indicador</h5>
                <div class="ml-3 padding-ultra-small">
                    <form action="{{route('datos.index')}}" method="get">
                        <div class="row d-flex align-items-center">
                            <div class="input-field col m8">
                                <select name="perspectiva" id="perspectiva">
                                    @forelse ($perspectivas as $perspectiva)
                                    <option value="{{$perspectiva->slug}}" {{$perspectiva->slug === $perspectivaObjetivos->slug 
                                                ? 'selected' : ''}}>{{$perspectiva->titulo}}</option>
                                    @empty
                                    <option value="">No hay perspectiva</option>
                                    @endforelse
                                </select>
                                <label>Seleccione la perspectiva</label>
                            </div>
                            <div class="col m3">
                                <button class="btn" type="submit">Filtar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Grafica --}}
        <a href="{{route('datos.grafica', 1)}}" class="btn">Grafica</a>

        {{-- @if ($perspectivaObjetivos->slug === 'FI')
        @include('admin.datos.perspectivaObjetivos', [
        'perspectivaObjetivos' => $perspectivaObjetivos
        ])
        @elseif ($perspectivaObjetivos->slug === 'CL')
        @include('admin.datos.perspectivaObjetivos', [
        'perspectivaObjetivos' => $perspectivaObjetivos
        ])

        @elseif ($perspectivaObjetivos->slug === 'PR')
        @include('admin.datos.perspectivaObjetivos', [
        'perspectivaObjetivos' => $perspectivaObjetivos
        ])

        @elseif ($perspectivaObjetivos->slug === 'AP')
        @include('admin.datos.perspectivaObjetivos', [
        'perspectivaObjetivos' => $perspectivaObjetivos
        ])
        @else
        <div>No existe esta perspectiva.</div>

        @endif --}}



    </div>
</div>
@endsection