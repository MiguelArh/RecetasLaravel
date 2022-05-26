@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb 4">
            Resultado de Búsqueda: {{$busqueda}}
        </h2>

        <div class="row mb-4">
            @foreach ($recetas as $receta)
                @include('ui.receta')
            @endforeach

            <div class="col-12 mt-2 justify-content-center d-flex font-weight-bold">
                @include('vendor.pagination.simple-bootstrap-4')
            </div>
        </div>
    </div>
@endsection
