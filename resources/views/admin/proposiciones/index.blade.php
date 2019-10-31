@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-3">
                <div class="">
                    <div class="h3 no-margin">Proposición de Valor</div>
                    <div class="subtitle">Proposición de Valor para el Cliente</div>
                </div>
                <div class="d-flex">
                    <div>
                        <a href="{{ route('proposiciones.edit', $proposicion->id) }}"
                            class="btn btn-outline-info text-uppercase">- Editar</a>

                    </div>
                    <form action="{{route('proposiciones.destroy', $proposicion->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="ml-2 btn btn-outline-danger text-uppercase">x Eliminar</button>
                    </form>
                </div>
            </div>

            @if(!$proposicion)
            <a href="{{route('proposiciones.create')}}" class="btn btn-link text-uppercase">+ Proposicion</a>
            <div class="mt-4 caption">Sin registros...</div>
            @else
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="bg-primary text-white font-weight-bold">
                                <td>CLIENTES(Segmento de Mercado)</td>
                            </tr>
                            <tr class="bg-primary text-white">
                                <td>{{ $proposicion->segmento }}</td>
                            </tr>

                            <tr class="bg-light text-dark font-weight-bold">
                                <td>PROPUESTA DE VALOR(¿Cuál de las tres alternativas se debe aplicar y porque?)</td>
                            </tr>
                            <tr class="bg-light text-dark">
                                <td>{{ $proposicion->propuesta }}</td>
                            </tr>
                            <tr class="bg-info text-white font-weight-bold">
                                <td>ELEMENTOS DIFERENCIADORES</td>
                            </tr>
                            <tr class="bg-info text-white">
                                <td>{{ $proposicion->elementos }}</td>
                            </tr>
                            <tr class="bg-secondary text-white font-weight-bold">
                                <td>ESTRATEGIAS DE DIFERENCIACION</td>
                            </tr>
                            <tr class="bg-secondary text-white">
                                <td>{{ $proposicion->estrategias }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection