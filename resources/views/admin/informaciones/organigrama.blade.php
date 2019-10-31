@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md">
            <div class="row mb-2 d-flex">
                <div class="col-md">
                    <div class="h3">
                        Organigrama
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body"
                            style="height:100vh;background:url({{asset('img/foda.png')}});background-position:center;background-size:cover;background-repeat:none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection