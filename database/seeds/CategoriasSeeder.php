<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Comida Mexicana',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Comida Italiana',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Comida Argentina',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Postres',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Cortes',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Ensaladas',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('categoria_recetas')->insert( [
            'nombre' => 'Desayunos',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
    }
}
