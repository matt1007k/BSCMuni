@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title font-weight-bold">
            <span class="text-muted">{{$objetivo->slug}}:</span>
            {{$objetivo->contenido}}
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('datos.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Datos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($indicadores as $key => $indicador)
                <div class="col-md-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="h4 font-weight-bold text-dark ">
                                Meta a cumplir por {{ $indicador['indicador']['tiempo']}}: <span
                                    class="text-success">{{ $indicador['indicador']['meta'] }}</span>

                            </div>
                            <div class="card-title d-flex justify-content-between">
                                <span class="h6">{{ $key + 1}}.- {{ $indicador['indicador']['indicador'] }}</span>
                                {{-- @json($indicador['indicador']['datos']) --}}
                            </div>
                            <grafica-datos :datos='@json($indicador["datos_grafica"])'></grafica-datos>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
    </div>
</div>
@endsection