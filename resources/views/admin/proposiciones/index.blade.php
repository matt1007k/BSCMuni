@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-md-12">
        <h4 class="page-title">
            Proposición de Valor para el Cliente
        </h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('estrategias.foda') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Matriz FODA
                    </a>
                </li>
            </ul>
            <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('objetivos.accion') }}">
                        Visión en Acción
                        <i class="mdi mdi-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="">

    <div class="row">
        <div class="col-md-12">

            @if(!$proposicion)

            <a href="{{route('proposiciones.create')}}" class="btn btn-success">Registrar proposición</a>
            <div class="text-center display-3 font-weight-bold mt-4 caption">Sin registros...</div>
            @else
            <div class="d-flex justify-content-end align-items-center">
                <div></div>
                <div class="d-flex">
                    <a href="{{ route('proposiciones.edit', $proposicion->id) }}"
                        class="btn btn-rounded btn-icons btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="Editar registro">
                        <i class="mdi mdi-pencil"></i>
                    </a>

                    <form action="{{route('proposiciones.destroy', $proposicion->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="ml-1 btn btn-rounded btn-icons btn-danger btn-sm" data-toggle="tooltip"
                            data-placement="top" title="Eliminar registro">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">CLIENTES(Segmento de Mercado)</div>
                    <div class="card-content font-italic bg-secondary px-3 py-4">{!! $proposicion->segmento !!}</div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">
                        PROPUESTA DE VALOR(¿Cuál de las tres alternativas se debe aplicar y porque?)
                    </div>
                    <div class="card-content font-italic bg-secondary px-3 py-4">{!! $proposicion->propuesta !!}</div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">
                        ELEMENTOS DIFERENCIADORES
                    </div>
                    <div class="card-content font-italic bg-secondary border-left px-3 py-4">
                        {!! $proposicion->elementos !!}</div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="text-uppercase h4 text-black">
                        ESTRATEGIAS DE DIFERENCIACION
                    </div>
                    <div class="card-content font-italic bg-secondary border-left px-3 py-4">
                        {!! $proposicion->estrategias !!}</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection