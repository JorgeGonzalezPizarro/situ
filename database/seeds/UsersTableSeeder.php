<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
//        DB::table('users')->insert([
//
//            'name' => 'ADMIN',
//            'email' => 'ADMIN@gmail.com',
//            'password'=> bcrypt('ADMIN'),
//            'rol'=>'1',
//            'permissions'=>'Administrador',
//
//        ]);

        $user = Sentinel::register([ 'name' => 'ADMIN',
            'email' => 'ADMIN@gmail.com',
            'password'=> bcrypt('ADMIN'),

            'permissions'=> ['Administrator'],
    ]
);
        $permission = ['{"user.create:1, user.update:1, user.delete:1"}', '{"hecho.create:1, hecho.update:1, hecho.view:1"}', '{""}','{""}'];

        //Activate the user **
        $activation = Activation::create($user);
        $activation = Activation::complete($user, $activation->code);

        $slug = ['Admin', 'Alu', 'Prof','Inv'];

        $name = ['Administrator', 'Alumno', 'Profesor','Invitado'];
        for ($i=0;$i<count($name);$i++){
            DB::table('roles')->insert([

                'slug' => $slug[$i],
                'name' => $name[$i],
                'permissions' => $permission[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


    }
}
