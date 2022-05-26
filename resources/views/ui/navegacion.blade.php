<a href=" {{route('recetas.create')}} " class="btn btn-outline-primary mr-2 mt-2 text-uppercase font-weight-bold">
    <svg xmlns="http://www.w3.org/2000/svg" class="icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg> Crear Receta</a>
<a href="{{route('perfiles.edit', ['perfil' => Auth::user()->id])}}" class="btn btn-outline-success mr-2 mt-2 text-uppercase font-weight-bold text-green">
    <svg xmlns="http://www.w3.org/2000/svg" class="icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
      </svg> Editar Perfil</a>
<a href="{{route('perfiles.show', ['perfil' => Auth::user()->id])}}" class="btn btn-outline-info  text-uppercase font-weight-bold text-blue mt-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="icono " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg> Ver Perfil</a>
