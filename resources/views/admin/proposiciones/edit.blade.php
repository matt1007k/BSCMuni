@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-6">

        <div class="card border-dark">
            <div class="card-header bg-dark text-white text-center h3">Editar proposición</div>
            <div class="card-body">

                <form action="{{route('proposiciones.update', $proposicion->id)}}" method="POST">
                    @method('PUT')
                    @include('admin.proposiciones._form', ['btnT' => 'Editar'])
                </form>
            </div>
        </div>
        <a href="{{route('proposiciones.index')}}" class="btn btn-link text-uppercase">
            <- Ir a proposición de valor </a> </div> </div> @endsection