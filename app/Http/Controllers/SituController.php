<?php

namespace App\Http\Controllers;

use App\Invitados;
use DB;
use Mail;
use App\User;
use App\Role;
use App\Etiqueta;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use App\hechos;
use App\Http\Controllers\HechoController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\In;
use Sentinel;
use View;
use Validator;
use Hash;
use Session;
use App\CursoAlumno;
use App\Categorias;
class SituController extends Controller
{

        public function getIndex(){

            $user=Sentinel::getUser();
            $alumno=Invitados::where('invitado_id',$user->id)->get()->first();
//        console.log($user->getHechos());
//            $invitado=$user->getAlumno()->get();
            return view('Situ.index')->with('user',$user)->with('alumno',$alumno);


        }


        public function getHechosPublicos(){
             $user=Sentinel::getUser();
            $alumno=Invitados::where('invitado_id',$user->id)->get()->first();

            $hechosPublicos=hechos::where('nivel_acceso','>=',$user->nivel_acceso)->get();
//            return response($hechosPublicos);
            return view('situ.index')->with('user',$user)->with('alumno',$alumno)
                ->with('hechos',$hechosPublicos);

}

}
