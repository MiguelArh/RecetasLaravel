<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    //Campos que se agregaran
    protected $fillable = [
        'titulo', 'ingredientes', 'preparacion','imagen', 'categoria_id',
    ];

    //Obtiene la Categoria de la Receta via FK

    public function categoria(){
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene la informacion del Usuario via FK

    public function autor(){
        return $this->belongsTo(User::class, 'user_id'); //Se  especifica el campo de la relacion de la tabla Users
    }


    //Likes que ha recibido una Receta

    public function likes(){
        return $this->belongsToMany(User::class, 'likes_receta');

    }

}
