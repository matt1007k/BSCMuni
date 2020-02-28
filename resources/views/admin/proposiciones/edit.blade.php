@extends('layouts.app')
@section('header-content')
<div class="row mb-3">
    <div class="col-12">
        <h4 class="page-title">Editar proposición</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
            <ul class="quick-links">
                <li>
                    <a href="{{ route('proposiciones.index') }}">
                        <i class="mdi mdi-arrow-left"></i>
                        Proposición de Valor
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

                <form action="{{route('proposiciones.update', $proposicion->id)}}" method="POST">
                    @method('PUT')
                    @include('admin.proposiciones._form', ['btnT' => 'Editar'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection