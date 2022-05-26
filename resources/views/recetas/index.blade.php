@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')

    <h2 class="text-center mb-5">Administra tus Recetas</h2>


    <div class="col-md-10 mx-auto bg-white ">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoria</th>
                    <th scole="col">Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($recetas as $receta)
                <tr>
                    <td>{{$receta->titulo}}</td>
                    <td> {{$receta->categoria->nombre}} </td>
                    <td class="d-flex flex-row">

                        <eliminar-receta receta-id="{{$receta->id}}" ></eliminar-receta>

                        <a href="{{route('recetas.edit', ['receta' => $receta->id])}}" class="btn btn-warning mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                              </svg> Editar</a>
                        <a href="{{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>Ver</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

        <div class="col-12 mt-2 justify-content-center d-flex font-weight-bold">
            @include('vendor.pagination.simple-bootstrap-4')
        </div>
    </div>

    <h2 class="text-center my-4">Recetas que te gustan</h2>
            <div class="col-md-10 mx-auto bg-white p-3">
                @if (count($usuario->meGusta)> 0)
                    <ul class="list-group">
                        @foreach($usuario->meGusta as $receta)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <p>{{$receta->titulo}}</p>
                                <a href=" {{route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-outline-success text-uppercasse font-weight-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icono-recetas " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg> Ver</a>
                            </li>
                        @endforeach
                    </ul>
                 @else
                    <p class="text-center col-12">
                        Aún no tienes recetas que te gusten
                    </p>
                @endif

            </div>


@endsection
