<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Iniciocontroler extends Controller
{
    public function index(){

        //Mostrar las Recetas por Cantidad de votos

        //$votadas = Receta::has('likes', '>=', 1)->get();

        $votadas = Receta::withCount('likes')->orderBy('likes_count','desc')->take(3)->get();




        //Obtener las Recetas mas nuevas
        $nuevas = Receta::latest()->take(4)->get();

        //Obtener todas las categorias
        $categorias = CategoriaReceta::all();


        // return $categorias;

        //Agrupar recetas por Categoria

        $recetas = [];

        foreach ($categorias as $categoria) {
            $recetas[Str::slug($categoria->nombre)][] = Receta::where('categoria_id', $categoria->id)->get();
        }




        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
