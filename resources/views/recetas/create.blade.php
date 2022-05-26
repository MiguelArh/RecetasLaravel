@extends('layouts.app')


@section('botones')
    <a href=" {{route('recetas.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" class="icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
          </svg> Volver</a>
@endsection

@section('content')

    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action=" {{route('recetas.store')}} " method="post" enctype="multipart/form-data"  novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo" class="">Titulo Receta</label>
                    <input type="text"
                            name="titulo"
                            id="titulo"
                            class="form-control @error('titulo') is-invalid @enderror"
                            placeholder="Ingrese Titulo de Receta"
                            value=" {{old('titulo')}} ">

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria Receta</label>
                    <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
                        <option value="">-- Seleccione una Categoria --</option>
                        @foreach ($categorias as $categoria)
                        <option value=" {{$categoria->id}} "
                            {{old('categoria') == $categoria->id ? 'selected' : ''}}
                        >
                            {{$categoria->nombre}}
                        </option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                <textarea class="ckeditor form-control" name="wysiwyg-editor"> </textarea>
                </div> --}}

                <div class="form-group mt-3" >
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{old('ingredientes')}}" >
                    <textarea input="ingredientes" class=" ckeditor form-control @error('ingredientes') is-invalid @enderror" name="ingredientes"> {{old('ingredientes')}} </textarea>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>


                {{-- <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value=" {{old('ingredientes')}} ">
                    <trix-editor input="ingredientes" class="form-control trix-content @error('ingredientes') is-invalid @enderror"></trix-editor>

                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div> --}}


                {{-- <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" name="preparacion" id="preparacion" value=" {{old('preparacion')}} ">
                    <trix-editor input="preparacion" class="form-control @error('preparacion') is-invalid @enderror"></trix-editor>

                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div> --}}


                <div class="form-group mt-3" >
                    <label for="preparacion">Preparación</label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{old('preparacion')}}" >
                    <textarea input="preparacion" class=" ckeditor form-control @error('preparacion') is-invalid @enderror" name="preparacion"> {{old('preparacion')}} </textarea>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Elige la Imagen de Receta</label>
                    <input type="file" name="imagen" id="imagen" class="form-control @error('preparacion') is-invalid @enderror">

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <crear-receta></crear-receta>


            </form>
        </div>
    </div>


@section('scripts')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

@endsection
