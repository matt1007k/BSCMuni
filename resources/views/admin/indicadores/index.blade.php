@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="row">
            <div class="col m12 d-flex justify-center align-items-center">
                <h5>Lista de indicadores de cada objetivo</h5>
                <div class="ml-3 padding-ultra-small">
                    <form action="{{route('indicadores.index')}}" method="get">
                        <div class="row d-flex align-items-center">
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
                            <div class="col m3">
                                <button class="btn" type="submit">Filtar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(count($perspectivas) > 0)
            @if ($perspectivaObjetivos->slug === 'FI')
            @include('admin.indicadores.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
            ])
            @elseif ($perspectivaObjetivos->slug === 'CL')
            @include('admin.indicadores.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
            ])

            @elseif ($perspectivaObjetivos->slug === 'PR')
            @include('admin.indicadores.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
            ])

            @elseif ($perspectivaObjetivos->slug === 'AP')
            @include('admin.indicadores.perspectivaObjetivos', [
            'perspectivaObjetivos' => $perspectivaObjetivos
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