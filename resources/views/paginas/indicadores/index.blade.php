@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Todos los indicadores</h3>
        </div>
    </div>
    <div class="w-100 text-center">
        <div class="ml-3 padding-ultra-small">
            <div class="btn-group" role="group" aria-label="Filtro perspectivas">
                @forelse ($perspectivas as $perspectiva)
                    <a href="{{url('/objetivos/indicadores?perspectiva='.$perspectiva->slug)}}" class="btn btn-info @if($perspectiva->slug === $perspectivaObjetivos->slug) active @endif">{{$perspectiva->titulo}}</a>
                @empty
                    <option value="">No hay perspectiva</option>
                @endforelse
            </div>                        
        </div>
    </div>

    
    <div class="card">
        <div class="card-body">
            @if(count($perspectivas) > 0)
                @if ($perspectivaObjetivos->slug === 'FI')
                @include('paginas.indicadores.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
                ])
                @elseif ($perspectivaObjetivos->slug === 'CL')
                @include('paginas.indicadores.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
                ])
    
                @elseif ($perspectivaObjetivos->slug === 'PR')
                @include('paginas.indicadores.perspectivaObjetivos', [
                'perspectivaObjetivos' => $perspectivaObjetivos
                ])
    
                @elseif ($perspectivaObjetivos->slug === 'AP')
                @include('paginas.indicadores.perspectivaObjetivos', [
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
</div>
@endsection