<?php
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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

        $permission = ['{"user.create:1, user.update:1, user.delete:1"}', '{"hecho.create:1, hecho.update:1, hecho.view:1"}', '{""}','{""}'];


        $slug = ['Admin', 'Alu', 'Prof','Inv'];
        $otros_datos=array('facebook'=>'','img'=>'/js/tinymce/js/tinymce/plugins/responsive_filemanager/source/user_default.png');

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

        $role=Sentinel::findRoleById(1);
        $user = Sentinel::register([
            'email' => 'ADMIN@gmail.com',
            'password'=> ('ADMIN'),
            'first_name' =>('Antonio'),
            'last_name'=> ('Fernandez'),
            'permissions'=> ['Administrator'],
            'nivel_acceso'=>('1'),
            'otros_datos'=>json_encode($otros_datos)
        ]);



        //Activate the user **
        $activation = Activation::create($user);
        $activation = Activation::complete($user, $activation->code);
        $role->users()->attach($user);







    }
}
