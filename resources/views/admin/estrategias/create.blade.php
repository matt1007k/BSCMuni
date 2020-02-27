@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Registrar estrategia de {{$tipo}}</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('estrategias.foda') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Matriz FODA
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
                <form action="{{route('estrategias.store')}}" method="POST">
                    @include('admin.estrategias._form', ['btnT' => 'Registrar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection