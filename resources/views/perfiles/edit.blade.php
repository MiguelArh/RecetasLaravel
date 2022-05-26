@extends('layouts.app')


@section('botones')
    <a href=" {{route('recetas.index')}}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg xmlns="http://www.w3.org/2000/svg" class="icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
          </svg> Volver</a>
@endsection

@section('content')
{{--     --}}
    <h1 class="text-center">Editar Perfil</h1>

    <div class="row justify-content-center mt-4">
        <div class="col-md-10 bg-white p-2">
            <form action=" {{route('perfiles.update', ['perfil' => $perfil->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="nombre" class="">Nombre</label>
                    <input type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Ingresa tu Nombre"
                            value=" {{$perfil->usuario->name}}">

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="url" class="">Sitio Web</label>
                    <input type="text"
                            name="url"
                            id="url"
                            class="form-control @error('url') is-invalid @enderror"
                            placeholder="Ingresa tu Sitio Web"
                            value=" {{$perfil->usuario->url}}">

                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form-group mt-3">
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia" id="biografia" value="{{$perfil->biografia}}" >
                    <trix-editor input="biografia" class="form-control @error('biografia') is-invalid @enderror"></trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div> --}}

                <div class="form-group mt-3" >
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia" id="biografia" value=" {{$perfil->biografia}} "  >
                    <textarea input="biografia" class="ckeditor form-control @error('biografia') is-invalid @enderror" name="biografia">{{$perfil->biografia}}</textarea>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Tu Imagen</label>
                    <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">

                    @if($perfil->imagen)

                        <div class="mt-3">
                            <p>Imagen Actual:</p>
                            <img src="/storage/{{$perfil->imagen}}" style="width: 300px" alt="">
                        </div>
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" value="Actualizar Perfil" class="btn btn-primary">
                </div>
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


