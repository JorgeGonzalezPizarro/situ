<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            'name' => 'ADMIN',
            'email' => 'ADMIN@gmail.com',
            'password'=> bcrypt('ADMIN'),
            'rol'=>'1',
            'nombre_rol'=>'Administrador',

        ]);


    }
}
