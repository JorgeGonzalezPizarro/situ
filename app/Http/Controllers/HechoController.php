<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use Situ\hechos;
use Dotenv\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
class HechoController extends Controller
{


        public function guardar_Hecho(Request $request){

            $rules = array( 'titulo_hecho' => 'required');

            $validator = Validator::make(Input::all(),$rules);


            if($validator->fails()){
                return Redirect::to('hechos/crear')->withErrors($validator)->withInput();
            }
            else{
                $hecho = new hechos();
                $hecho -> usuario = Auth::user()->getAuthIdentifierName();
                $hecho -> titulos_hecho= Input::get('titulos_hecho');
                $hecho -> curso= Input::get('curso');
                $hecho -> contenido= Input::get('contenido');
                $hecho -> proposito= Input::get('proposito');
                $hecho -> evidencia= Input::get('evidencia');
                $hecho -> etiquetas= Input::get('etiquetas');
                $hecho -> nivel_autorizacion= Input::get('nivel_autorizacion');
                $hecho -> hechos_relacionados= Input::get('hechos_relacionados');
                $hecho -> fecha_hecho= Input::get('fecha_hecho');

                $hecho->save();

                return response()->json(array($hecho));

            }


        }


    public function crear(Request $request){

            if(Auth::user()){
                return view('crear');
            }
    }



    }
