@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Registrar información de la organización</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('informaciones.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Informaciones
                    </a>
                </li>
            </ul>
            {{-- <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('procesos.index') }}">
            Macro Proceso
            <i class="mdi mdi-arrow-right"></i>
            </a>
            </li>
            </ul> --}}
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 font-weight-bold h3">Registrar información de la empresa</div>

                <form action="{{route('informaciones.store')}}" method="POST">

                    @include('admin.informaciones._form', ['btnT' => 'Registrar'])

                </form>

            </div>
        </div>
    </div>
</div>
@endsection