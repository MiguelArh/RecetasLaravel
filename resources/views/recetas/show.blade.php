@extends('layouts.app')

@section('content')
    {{-- <h2> {{$receta}} </h2> --}}



    <article class="contenido-receta bg-white p-5 shadow">
        <h2 class="text-center mb-4"> {{$receta->titulo}}</h2>

        <div class="imagen-receta">
            <img src="/storage/{{$receta->imagen}}" class="w-100" alt="">
        </div>

        <div class="receta-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                <a class="text-dark" href="{{route('categorias.show', ['categoriaReceta'=>$receta->categoria->id ])}}">
                    {{$receta->categoria->nombre}}
                </a>

            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                <a class="text-dark" href="{{route('perfiles.show', ['perfil'=>$receta->autor->id ])}}">
                    {{$receta->autor->name}}
                </a>


            </p>

            <p>

                {{-- Publicado: <span class="font-normal"> {{$receta->created_at->diffForHumans()}} </span> --}}
                <span class="font-weight-bold text-primary">Publicado:</span>
                @php
                   $fecha = $receta->created_at
                @endphp
                <fecha-receta fecha="{{$fecha}}"></fecha-receta>
            </p>



            <div class="ingredientes">
                <h2 class="my-2 text-primary">Ingredientes</h2>
                {!!$receta->ingredientes!!}

            </div>

            <div class="preparacion">
                <h2 class="my-2 text-primary">Preparación</h2>
                {!!$receta->preparacion!!}

            </div>

            <div class="justify-content-center row text-center">
                <boton-like receta-id="{{$receta->id}}" like="{{$like}}" likes="{{$likes}}"></boton-like>
            </div>





        </div>
    </article>
@endsection
