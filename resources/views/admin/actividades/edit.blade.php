@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Editar actividad</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('areas.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Cadena de valor
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
                <div class="mb-3 font-weight-bold h3">Editar actividad</div>

                <form action="{{route('areas.activities.update', [$area, $actividad])}}" method="POST">
                    @method('PUT')
                    @include('admin.actividades._form', ['btnT' => 'Editar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection