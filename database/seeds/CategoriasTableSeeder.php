<?php

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $categoria = ['Trabajo Académico', 'Calificaciones', 'Frases guía','Reflexiones','Portafolios profesional','Proyectos de investigación'];

        for ($i=0;$i<count($categoria);$i++){
            DB::table('categorias')->insert([

                'categoria' => $categoria[$i],

            ]);
        }    }
}
