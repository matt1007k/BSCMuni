@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col m12 text-center">
            <h2>BSC C&C RABATE S.R.L.</h2>
        </div>

    </div>
    <div class="row">
        @foreach ($paginas as $pagina)
        <div class="m-auto card col-md-5">  
            <a href="{{route($pagina['ruta'])}}" class="btn">                                  
                <div class="card-body d-flex align-items-center">
                    <div class="card-title font-weight-bold text-info">{{$pagina['titulo']}}</div>
                </div>
            </a>                    
        </div>
        @endforeach        
    </div>
@endsection
