<?php
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class EtiquetasTableSeeder extends Seeder
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



        $slug = ['UFV', 'Proyecto', 'Voluntariado','Evento','CV'];

        $nombre = ['UFV', 'Proyecto', 'Voluntariado','Evento','CV'];
        for ($i=0;$i<count($nombre);$i++){
            DB::table('etiqueta')->insert([

                'slug' => $slug[$i],
                'nombre' => $nombre[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }






    }
}
