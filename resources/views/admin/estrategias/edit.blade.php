@extends('layouts.app')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Editar estrategia de {{$tipo}}</h4>
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
                <form action="{{route('estrategias.update', $estrategia->id)}}" method="POST">
                    @method('put')
                    @include('admin.estrategias._form', ['btnT' => 'Editar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection