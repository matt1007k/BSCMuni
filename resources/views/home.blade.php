@extends('layouts.app')

@section('content')
<div class="container mb-4">

    <div class="row mb-3">
        <div class="col-md-12 ">
            <h2><span class="text-primary">BSC</span>Tienda</h2>
            <p>Realiza tus proyecciones a futuro y crece como empresa.</p>
        </div>
    </div>
    <div class="row">
        <ul class="list-group col-md-5">
            @foreach ($paginas as $pagina)
            <li class="list-group-item d-flex">
                <span class="fas fa-check"></span>
                <a href="{{route($pagina['ruta'])}}" class="ml-3 text-decoration-none font-weight-bold ">
                    {{$pagina['titulo']}}
                </a>
            </li>
            @endforeach
        </ul>
        <div class="col-md-7" style="background: url({{asset('img/tienda.jpeg')}}); background-cover:center">
        </div>
    </div>

</div>
@endsection