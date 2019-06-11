@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12 center-align">
            <h2>BSC Colegio Saco Oliveros</h2>
            <img src="{{asset('/img/saco-oliveros.png')}}" style="height: 100px" alt="Colegio Saco Oliveros">
        </div>

    </div>
    <div class="row">
        @foreach ($paginas as $pagina)
            <div class="col m3">
                <a href="{{route($pagina['ruta'])}}">
                    <div class="card">                
                        <div class="card-content center-align">
                            <div class="icon4x">
                                <i class="{{$pagina['icono']}}"></i>
                            </div>
                            
                            <div class="card-subtitle">{{$pagina['titulo']}}</div>
                    
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        
    </div>
@endsection
