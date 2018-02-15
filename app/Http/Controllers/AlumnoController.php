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

        return view('Alumno.alumnoDatos')->with('user',$user);;

    }


    public function actualizarMisDatos(Request $request){

        $user=Sentinel::getUser();

        $user->first_name=Input::get('first_name');
        $user->last_name=Input::get('last_name');

        if(Input::get('email') && Input::get('new_password')){
            if(Input::get('new_password')==Input::get('old_password'))
        $credentials = [
            'email'    => Input::get('email') ,
            'password' => Input::get('old_password'),
        ];

        }
        elseif (Input::get('email')){
            $credentials = [
                'email'    => Input::get('email') ,
                'password' => Input::get('old_password'),
            ];
        }

        elseif (Input::get('new_password')){
            $credentials = [
                'email'    => $user->email,
                'password' => Input::get('new_password'),
            ];
        }


            $user->email=$credentials->email;
            $user->password=$credentials->password;
            $user->save();

            return Redirect::back();







    }


}
