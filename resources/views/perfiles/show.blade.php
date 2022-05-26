@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            @if($perfil->imagen)
            <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle" alt="">
            @endif
        </div>

        <div class="col-md-7 mt-5 mt-md-0">
            <h2 class="text-center mb-2 text-primary font-weight-bold">{{$perfil->usuario->name}}</h2>
            <a class="font-weight-bold" href="{{$perfil->usuario->url}}">Visitar Sitio Web</a>
            <div class="biografia mt-2">
                {!! $perfil->biografia !!}
            </div>

        </div>
    </div>
</div>

<h2 class="text-center my-3">Recetas creadas por : {{$perfil->usuario->name}} </h2>

<div class="container">
    <div class="row mx-auto bg-white-p-3">
        @if(count($recetas)> 0)
            @foreach ( $recetas as $receta )
                <div class="col-md-4 mb 3">
                    <div class="card">
                        <img src="/storage/{{$receta->imagen}}" class="card-img-top" alt="Imagen Receta">
                        <div class="card-body">
                            <h3> {{$receta->titulo}} </h3>
                            <a href=" {{route('recetas.show', ['receta' => $receta->id])}} " class="btn btn-primary text-uppercase font-weight-bold">Ver Receta</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center col-12">
                Aun no hay Recetas...
            </p>
        @endif

        <div class="col-12 mt-4 justify-content-center d-flex font-weight-bold">
            @include('vendor.pagination.simple-bootstrap-4')
        </div>
    </div>
</div>


@endsection
