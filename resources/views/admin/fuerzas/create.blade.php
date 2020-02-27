@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Registrar fuerza de Porter</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('fuerzas.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Las 5 Fuerzas de Porter
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
                <form action="{{route('fuerzas.store')}}" method="POST">

                    @include('admin.fuerzas._form', ['btnT' => 'Registrar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection