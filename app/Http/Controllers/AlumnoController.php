<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use App\hechos;
use App\Http\Controllers\HechoController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Sentinel;
use View;
use Validator;
use Hash;
use Session;
use App\CursoAlumno;
use App\Categorias;
class AlumnoController extends Controller

{
    public function __construct()
    {
        //$this->middleware('auth')->except('orders');
        $this->middleware('Alumno');
        $categorias = Categorias::all();
        view()->share('categorias',$categorias);

    }

    public function getDashboard(){
        $user=Sentinel::getUser();
//        console.log($user->getHechos());
        $categorias = Categorias::all();
        $hechos=$user->getHechos()->get();
        view()->share('categorias',$categorias);
        return view('Alumno.alumnoDashboard')->with('hechos',$hechos)->with('categorias',$categorias);

    }


    public function showHecho($id){
        $user=Sentinel::getUser();
//        console.log($user->getHechos());

        $hecho= hechos::find($id);
        return view('Alumno.hecho.singleHecho')->with('hecho',$hecho);

    }

    public function getHechoUsuario(Request $request){
        $id =$request->id;
        $hecho = hechos::find($id);

        return response($hecho);
    }


    public function alumnoDatos (){


        $user = Sentinel::getUser();
        $otros_datos=json_decode($user->otros_datos,true);
//        return view('Alumno.alumnoDatos')->with('user',$user);

        return view('Alumno.datos.alumnoDatos')->with('user',$user)->with('otros_datos', $otros_datos);
    }
    public function alumnoDatosAcademicos (){


        $user = Sentinel::getUser();

        $otros_datos=json_decode($user->otros_datos,true);

        $curso= $user->getDatosAcademicos()->get();
//        if (!empty($curso->asignaturas)) {
////            $asignaturas = json_decode($curso->asignaturas, true);
//        }else{$curso=new CursoAlumno();
//
//
//        }
//        return view('Alumno.alumnoDatos')->with('user',$user);

//        return view('Alumno.datos.alumnoDatosAcademicos')->with('user',$user)
//            ->with('otros_datos', $otros_datos)
//            ->with('curso',$curso)
//            ->with('asignaturas',$curso);
     return response($curso->all());

    }

    public function getAsignaturas(Request $request){

        $user=Sentinel::getUser();


    }
    public function actualizarMisDatosAcademicos(Request $request)
    {
        $user=Sentinel::getUser();
        $cursoAlumno= CursoAlumno::firstOrCreate(['curso'=>Input::get('curso'),'user_id'=>$user->id],
            ['curso'=>Input::get('curso'),'user_id'=>Input::get('user´_id')]





        );
//         $cursoAlumno->fill(Input::get());
//       $cursoAlumno=CursoAlumno::updateOrCreate(['user_id'=>$user->id,'curso'=>Input::get('curso')],
//          [ 'asignaturas'=>Input::get('asignaturas'),'grado'=>Input::get('grado')]);
//


//        $cursoAlumno->grado="aaaa";


//        $asignatura=array($cursoAlumno>asignaturas);
//        $asignatura=json_decode($cursoAlumno->asignaturas);
//        $asignaturas=count($asignatura);
//
//        for ($i =0;$i<$asignaturas;$i++){
//
//         array_add($asignatura,$i,Input::get('asignatura'));
//       }
//
//       $cursoAlumno->user_id=$user->id;
//       $cursoAlumno->curso=Input::get('curso');
//       $cursoAlumno->grado=Input::get('grado');

        if(!empty($cursoAlumno->asignaturas)){
            $asignaturas=json_decode($cursoAlumno->asignaturas);

        }else{

            $asignaturas=array();
        }
        $nuevasAsignaturas=array_prepend($asignaturas,(Input::get('asignatura')));

//         $cursoAlumno->asignaturas=json_encode(Input::get('asignatura'));
        $cursoAlumno->asignaturas=json_encode($nuevasAsignaturas);
         $cursoAlumno->save();
        Session::flash('msg', "cambios realizados");

        return Redirect::back();


    }




    public function actualizarMisDatos(Request $request){
      $user=Sentinel::getUser();

        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');
        $otros_datos=array('facebook'=>Input::get('facebook'),'img'=>Input::get('imagen'));

        $user->otros_datos=json_encode($otros_datos);


        $credentials = [
            'email'    => $user->email,
            'password' => Input::get('old_password'),
        ];


        $rules = array(
            'password' => 'confirmed',
        );

        $validator= Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            Session::flash('error', "Las contraseñas no coinciden");

            return Redirect::back()->withErrors(['msg', 'The Message']);
        }

        if(Input::get('password')!=null){

            if (Activation::completed($user)) {
                // If it is the case check credentials
                    $user->password = Hash::make(Input::get('password'));
                    $user->save();
                Session::flash('msg', "cambios realizados");
                return Redirect::back();

            } else{
                return response("fallo al completar");
            }




        } else{
            $user->save();

            Session::flash('msg', "cambios realizados");

            return Redirect::back();
        }




    }


}
