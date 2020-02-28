@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Editar objetivo</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('perspectivas.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Los Ojetivos Estratégicos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{route('perspectivas.objetivos.update', [$perspectiva, $objetivo])}}" method="POST">
                    @method('put')

                    @include('admin.objetivos._form', ['btnT' => 'Editar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection