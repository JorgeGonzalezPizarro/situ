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

        return view('Alumno.datos.alumnoDatos')->with('user',$user);;

    }
    public function alumnoDatosAcademicos (){


        $user = Sentinel::getUser();

        return view('Alumno.datos.alumnoDatosAcademicos')->with('user',$user);;

    }
    public function actualizarMisDatosAcademicos(Request $request)
    {

       return response($request);


    }
    public function actualizarMisDatos(Request $request){
      $user=Sentinel::getUser();

        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');

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
//            $user->password=Input::get('password');

//          $user->save();



        } else{
            $user->save();

            Session::flash('msg', "cambios realizados");

            return Redirect::back();
        }
//        $user->save();
//
//
//        return Redirect::back();
//


//        if(Input::get('new_password')){
//            if(Input::get('new_password')==Input::get('old_password'))
//        $credentials = [
//            'email'    => Input::get('email') ,
//            'password' => Input::get('old_password'),
//        ];
//
//        }
//        elseif (Input::get('email')){
//            $credentials = [
//                'email'    => Input::get('email') ,
//                'password' => Input::get('old_password'),
//            ];
//        }
//
//        elseif (Input::get('new_password')){
//            $credentials = [
//                'email'    => $user->email,
//                'password' => Input::get('new_password'),
//            ];
//        }
//
//
//            $user->email=$credentials->email;
//            $user->password=$credentials->password;
//            $user->save();

//            return Redirect::back();







    }


}
