<?php

namespace App\Http\Controllers;

use App\User;
use App\Receta;
use App\CategoriaReceta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class RecetaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Auth::user()->recetas->dd();



        //Paginacion
        $usuario = Auth::user();

        $recetas = Receta::where('user_id', $usuario->id)->paginate(3);




        return view('recetas.index',compact('recetas','usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //DB::table('categoria_receta')->get()->pluck('nombre','id')->dd();

        //Obtener Categorias (Sin modelo)
        //$categorias = DB::table('categoria_recetas')->get()->pluck('nombre','id');


        //Obtener Categorias (Conn modelo)

        $categorias = CategoriaReceta::all(['nombre','id']);


        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request['imagen']->store('uploads-recetas', 'public'));


        //Validaciones
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
        ]);

        //obtener ruta de imagen
        $ruta_imagen = $request['imagen']->store('uploads-recetas', 'public');

          //Renombrar el Archivo con Fecha de Subida
        //$ruta_imagen = time() . '.' . $ruta_imagen;

        //Resize de la imagen

        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);



        $img->save();

        //Almacenar en la base de datos(Sin modelo)
        // DB::table('recetas')->insert( [
        //     'titulo' => $data['titulo'],
        //     'ingredientes' => $data['ingredientes'],
        //     'preparacion' => $data['preparacion'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria'],

        // ]);


        //Almacenar en la base de datos(Con modelo)
        Auth::user()->recetas()->create([
            'titulo' => $data['titulo'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria'],
        ]);


        //Redireccionar

         return redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        // Obtener si el usuario  actual le gusta la receta y esta autenticado

        $like = (auth()->user()) ? auth()->user()->meGusta->contains($receta->id) : false;

        //pasa la cantidad de likes a la vista

        $likes = $receta->likes->count();


        return view('recetas.show', compact('receta', 'like', 'likes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {

        $categorias = CategoriaReceta::all(['nombre','id']);

        return view('recetas.edit', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {

        //Revisar el Policy
        $this->authorize('update', $receta);

         //Validaciones
         $data = request()->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        $receta->titulo = $data['titulo'];
        $receta->preparacion = $data['preparacion'];
        $receta->ingredientes = $data['ingredientes'];
        $receta->categoria_id = $data['categoria'];

        //Si el usuario sube una nueva imagen

        if(request('imagen')){
             //obtener ruta de imagen
        $ruta_imagen = $request['imagen']->store('uploads-recetas', 'public');

        //Resize de la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        $receta->imagen = $ruta_imagen;
        }

        $receta->save();
       // return $receta;

         //Redireccionar

         return redirect()->action('RecetaController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {

        //Ejecutar el policy
        $this->authorize('delete', $receta);

        //Eliminar Receta

        $receta->delete();

        return redirect()->action('RecetaController@index');

    }

    public function search(Request $request){

        //$busqueda = $request['buscar'];
        $busqueda = $request->get('buscar');

        $recetas = Receta::where('titulo', 'like', '%'. $busqueda . '%')->paginate(10);
        $recetas->appends(['buscar' => $busqueda]);
        return view('busquedas.show', compact('recetas', 'busqueda'));
    }
}
