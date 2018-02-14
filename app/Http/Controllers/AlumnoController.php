<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\hechos;
use App\Http\Controllers\HechoController;
use Sentinel;
class AlumnoController extends Controller

{
    public function __construct()
    {
        //$this->middleware('auth')->except('orders');
        $this->middleware('Alumno');
    }

    public function getDashboard(){
        $user=Sentinel::getUser();
//        console.log($user->getHechos());
        
        $hechos=$user->getHechos()->get();
        return view('Alumno.alumnoDashboard')->with('hechos',$hechos);

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


}
