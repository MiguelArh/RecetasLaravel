<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Miguel',
            'email' => 'correo@correo.com',
            'password' => Hash::make('miguelrh788') ,
            'url' => 'https://www.google.com.mx',
        ]);



        $user2 = User::create([
            'name' => 'Miguel Angel',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('miguelrh788') ,
            'url' => 'https://www.google.com.mx',
        ]);



        // DB::table('users')->insert( [
        //     'name' => 'Miguel Angel',
        //     'email' => 'correo2@correo.com',
        //     'password' => Hash::make('miguelrh788') ,
        //     'url' => 'https://www.google.com.mx',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);
    }
}
