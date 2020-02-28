@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Editar Indicador</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('indicadores.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Indicadores
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{route('indicadores.update', $indicador->id)}}" method="POST">
                    @method('put')
                    @include('admin.indicadores._form', ['btnT' => 'Editar'])
                </form>

            </div>
        </div>
    </div>
</div>
@endsection