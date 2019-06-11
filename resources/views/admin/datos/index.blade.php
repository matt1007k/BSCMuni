@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col m12">
        <div class="row">
            <div class="col m12 center-align">
                <h5>Lista de datos de cada indicador</h5>
            </div>
        </div>
        <div class="row">
            <div class="col m5 offset-m4 padding-ultra-small">
                <form action="{{route('datos.index')}}" method="get">
                    <div class="row d-flex">
                        <div class="input-field col m12">
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

            @endif
        @else
        <div>No hay perspectivas registradas.</div>

        @endif



    </div>
</div>
@endsection