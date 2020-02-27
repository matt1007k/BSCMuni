@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Editar dato</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('datos.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Datos
                    </a>
                </li>
            </ul>
            {{-- <ul class="quick-links ml-auto">
                <li>
                    <a href="{{ route('maestro.index') }}">
            Maestro
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
                {{-- <div class="mb-3 font-weight-bold h3">Editar dato</div> --}}
                <form action="{{route('datos.update', $dato->id)}}" method="POST">
                    @method('PUT')
                    @include('admin.datos._form', ['btnT' => 'Editar'])
                </form>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection