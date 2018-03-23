<?php

namespace App\Http\Controllers;

use App\Formacion;
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
    public function showHecho($id=null,$categoria=null)
    {
        if(is_null($id) && is_null($categoria)) {
            $usuario = Sentinel::getUser();
            $alumno=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $hecho = hechos::all();
            $hechosPublicos = hechos::where('nivel_acceso', '>=', $usuario->nivel_acceso)->get()->all();
            $categorias = Categorias::all();
//            $categoria = $hecho->getCategoria()->get()->first();

            view()->share('categorias', $categorias);

        }
        elseif($id=='0' &&!is_null($categoria)) {
            $usuario = Sentinel::getUser();
            $alumno=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $hecho = hechos::find($id);
            $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso],
                ['categoria_id',$categoria]])->get()->all();
            $categoria = Categorias::where('id',$categoria)->get()->first();
//            $curso = $hecho->curso;
            $categorias = Categorias::all();
//            return $hechosPublicos;
//            return response($hechosPublicos);
            view()->share('categorias', $categorias);
        }
        else{
            $usuario = Sentinel::getUser();
            $alumno=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $hecho = hechos::find($id);
            $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso],
                ['categoria_id',$categoria],['id','!=',$hecho->id]])->get()->all();
            $categoria = $hecho->getCategoria()->get()->first();
            $curso = $hecho->curso;
            $categorias = Categorias::all();

            view()->share('categorias', $categorias);
        }
        $otros_datos = json_decode($usuario->otros_datos, true);
        if(isset($categoria)) {
            if ($categoria->categoria == 'Calificaciones') {
                return view('Situ.hechos.singleHecho.calificacion')->with('hecho', $hecho)
                    ->with('hechos', $hechosPublicos)->with('user', $usuario)->with('alumno',$alumno);


            }
            if ($categoria->categoria == 'Trabajo Académico') {
                return view('Situ.hechos.singleHecho.trabajoAcademico')->with('hecho', $hecho)
                    ->with('hechos', $hechosPublicos)->with('hechos', $hechosPublicos)->with('user', $usuario)
                    ->with('alumno',$alumno);

            }
            if ($categoria->categoria == 'Recuerdos') {
                return view('Situ.hechos.singleHecho.recuerdos')->with('hecho', $hecho)
                    ->with('hechos', $hechosPublicos)->with('hechos', $hechosPublicos)->with('user', $usuario)
                    ->with('alumno',$alumno);


            }
            if ($categoria->categoria == 'Portafolios profesional') {

                return view('Situ.hechos.singleHecho.portafolioProfesional')->with('hecho', $hecho)
                    ->with('hechos', $hechosPublicos)->with('user', $usuario)
                    ->with('alumno',$alumno);

            }
            if ($categoria->categoria == 'Frases guía') {
                return view('Situ.hechos.singleHecho')->with('hechos', $hechosPublicos);

            }
        }
        else {
            return view('Situ.hechos.singleHecho')->with('user',$usuario)->with('alumno',$alumno)
                ->with('hechos',$hechosPublicos);;
        }


//        return view('Alumno.hecho.singleHecho')->with('hecho', $hecho);

    }



    public function cv()
    {
        if (Sentinel::inRole('Prof')) {
            $usuario = Sentinel::getUser();
            $invitado=Invitados::where('invitado_id',$usuario->id);
            $alumnoCv=$invitado->
//        $alumno = Invitados::where('invitado_id', $usuario->id)->get()->first();
            $hecho = hechos::all();
            $formacion = hechos::where([['nivel_acceso', '>=', $alumnoCv->nivel_acceso], ['formacion_id', '!=', null]])->get()->all();
            $laboral = hechos::where([['nivel_acceso', '>=', $alumnoCv->nivel_acceso], ['laboral_id', '!=', null]])->get()->all();

            $categorias = Categorias::all();

//            $categoria = $hecho->getCategoria()->get()->first();

            view()->share('categorias', $categorias);

        } else {
            $usuario = Sentinel::getUser();
            $usuario = $usuario->id;
            $alumnoCv = User::where('id', $usuario)->get()->first();
//            $hecho = hechos::all();
            $formacion = Formacion::where('user_id', $usuario)->get()->first();
            $laboral = hechos::where('user_id', $usuario)->get()->first();

            $categorias = Categorias::all();

//            $categoria = $hecho->getCategoria()->get()->first();

            view()->share('categorias', $categorias);
        }

        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "Portolio profesional de ";
        $view = \View::make('pdf.cv', compact('alumnoCv', 'alumnoCv', 'formacion', 'laboral'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
