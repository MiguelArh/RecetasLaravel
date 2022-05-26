<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Evento cuando un Usuario es Creado

    protected static function boot(){

        parent::boot();

        //Asignar perfil una vez se haya creado un usuario nuevo

        static::created(function ($user) {
            $user->perfil()->create();
        });
    }

    /* Relacion de 1:N de Usuario a Recetas*/

    public function recetas(){
        return $this->hasMany(Receta::class);
    }

    /* Relacion de 1:N de Usuario y Pefil*/

    public function perfil(){
        return $this->hasOne(Perfil::class);
    }

    public function meGusta()
    {
        return $this->belongsToMany(Receta::class, 'likes_receta');
    }
}
