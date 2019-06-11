@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="row">
            <div class="col m12 d-flex justify-center align-items-center">
                <h5>Resumen de resultados del BSC</h5>
            </div>
        </div>
        <div class="row">
            <div class="col m6 offset-m4">
                <form action="{{route('paginas.resumen')}}" method="get">
                    <div class="row">
                        <div class="input-field col m8">
                            <select name="perspectiva" id="perspectiva">
                                @forelse ($perspectivas as $perspectiva)
                                <option value="{{$perspectiva->slug}}" {{$perspectiva->slug === $perspectivaObjetivos->slug 
                                        ? 'selected' : ''}}>{{$perspectiva->titulo}}
                                </option>
                                @empty
                                <option value="">No hay perspectiva</option>
                                @endforelse
                            </select>
                            <label>Seleccione la perspectiva</label>
                        </div>
                    </div>
                    <div>
                        <button class="btn" type="submit">Filtar</button>
                    </div>
                </form>
            </div>
        </div>

        @if(count($perspectivas) > 0)
            @if ($perspectivaObjetivos->slug === 'FI')
            @include('paginas.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])
            @elseif ($perspectivaObjetivos->slug === 'CL')
            @include('paginas.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])

            @elseif ($perspectivaObjetivos->slug === 'PR')
            @include('paginas.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])

            @elseif ($perspectivaObjetivos->slug === 'AP')
            @include('paginas.maestro.perspectivaObjetivosResumen', [
            'perspectivaObjetivos' => $perspectivaObjetivos,
            ])
            @else
            <div>No existe esta perspectiva.</div>

            @endif

        @else
        <div>No hay perspectivas registradas.</div>

        @endif


    </div>
</div>
@endsection