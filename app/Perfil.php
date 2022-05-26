<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
     /* Relacion de 1:N de Pefil y usuario*/

     public function usuario(){
         return $this->belongsTo(User::class, 'user_id');
     }
}
