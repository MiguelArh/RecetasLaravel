<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //Recetas con paginacion

        $recetas = Receta::where('user_id', $perfil->user_id)->paginate(3);

        return view('perfiles.show', compact('perfil', 'recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {

          //Ejecutar Policy
          $this->authorize('view', $perfil);


        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {

        //Ejecutar Policy
        $this->authorize('update', $perfil);

        // Validar Datos

        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required',
        ]);



        //Si el usuario sube una imagen

        if($request['imagen']){
            $ruta_imagen = $request['imagen']->store('uploads-perfiles', 'public');

            //Resize de la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            //Crear un arreglo de imagen

            $array_imagen = ['imagen' => $ruta_imagen];
        }


        //Asignar Nombre y Url
        Auth::user()->url = $data['url'];
        Auth::user()->name = $data['nombre'];

        Auth::user()->save();

        //Eliminar Url y name de $data

        unset($data['url']);
        unset($data['nombre']);

        //Asignar Biografia e Imagen
        Auth::user()->perfil()->update( array_merge(
            $data,
            $array_imagen ?? []
        ));

        // Guardar datos

        //Redireccionar
        return redirect()->action('RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
