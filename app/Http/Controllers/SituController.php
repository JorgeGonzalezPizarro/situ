<?php

namespace App\Http\Controllers;

use App\Formacion;
use App\Invitados;
use App\Laboral;
use App\logAccesos;
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
    public function showHecho($id=null,$categoria=null,$alu=null)
    {
        /*ACCESO A LA PARTE PUBLICA*/
        if(is_null($id) && is_null($categoria)) {
//            return "aa";
            $usuario = Sentinel::getUser();
//            $alumno=Invitados::where('invitado_id',$usuario->id)->get()->first();

            if(Sentinel::inRole('Prof')){
                $usuario = Sentinel::getUser();

                $rol=Sentinel::findRoleById(2);
                $alumnos=$rol->users()->with('roles')->get();
                $hechosPublicos = hechos::where('nivel_acceso', '>=', $usuario->nivel_acceso)->get()->all();

            }elseif(Sentinel::inRole('Inv')) {

                $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
                $alumno=$invitado->getAlumno()->get()->first();
                $hecho = hechos::all();
                $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso],['user_id',$alumno->id]])->get()->all();


            }
            else{
                $alumno=$usuario;

                $hecho = hechos::all();
                $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso],['user_id',$alumno->id]])->get()->all();

            }
            $categorias = Categorias::all();
//            return "aa";
            view()->share('categorias', $categorias);

        }
        /*ACCESO A LA PARTE DEL CURRICULUM*/
        elseif($id==0 &&!is_null($categoria)) {

            $usuario = Sentinel::getUser();
            $alumno=Invitados::where('invitado_id',$usuario->id)->get()->first();

            $hecho = hechos::find($id);
            if(Sentinel::inRole('Prof')){
                $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
                $alumno=Sentinel::findById($alu);
                $invitado->alumno_id=$alu;
                $invitado->update();
                $alumno=$invitado->getAlumno()->get()->first();

                $rol=Sentinel::findRoleById(2);
                $alumnos=$rol->users()->with('roles')->get();
                $hechosPublicos = hechos::where([['user_id', $alumno->id]])->get();
                $logAccesos= logAccesos::firstOrCreate(['invitado_id'=>$invitado->id,
                    'alumno_id'=>$alumno->id,'hechos_id'=>null],['invitado_id'=>$invitado->id,
                    'alumno_id'=>$alumno->id,'rol'=>$invitado->rol,'hechos_id'=>$id,'numero_accesos'=>'0']);
                $logAccesos->numero_accesos=($logAccesos->numero_accesos)+1;
                $logAccesos->save();
            }else {

                $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso],
                    ['categoria_id', $categoria],['user_id', $usuario->id]])->get()->all();
            }
            $categoria = Categorias::where('id',$categoria)->get()->first();
            $categorias = Categorias::all();

            view()->share('categorias', $categorias);
        }
        else {

            $usuario = Sentinel::getUser();
//            $alumno=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $invitado = Invitados::where('invitado_id', $usuario->id)->get()->first();
//            $alumno = $invitado->getAlumno()->get()->first();

            $hecho = hechos::find($id);
            if (Sentinel::inRole('Prof')) {
                $alumno = $invitado->getAlumno()->get()->first();

                $hechosPublicos = hechos::where([['user_id', $alumno->id]])->get()->all();
                $hechosPublicos = $hechosPublicos->getEtiqueta()->with('CV');
//                    ['categoria_id',$categoria],['id','!=',$hecho->id]])->get()->all();
            } else {
                if (Sentinel::inRole('Inv')){
                    $alumno = $invitado->getAlumno()->get()->first();
                    $logAccesos= logAccesos::firstOrCreate(['invitado_id'=>$invitado->id,
                        'alumno_id'=>$alumno->id,'hechos_id'=>$id],['invitado_id'=>$invitado->id,
                        'alumno_id'=>$alumno->id,'rol'=>$invitado->rol,'hechos_id'=>$id,'numero_accesos'=>'0']);
                    $logAccesos->numero_accesos=($logAccesos->numero_accesos)+1;
                    $logAccesos->save();
                }else{
                    $alumno = $usuario;

                }

                $hechosPublicos = hechos::where([['user_id',  $alumno->id],['nivel_acceso', '>=', $usuario->nivel_acceso],
                    ['categoria_id', $categoria], ['id', '!=', $hecho->id]])->get()->all();
                $categoria = $hecho->getCategoria()->get()->first();
                $curso = $hecho->curso;
                $categorias = Categorias::all();

                view()->share('categorias', $categorias);
            }
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
            if(Sentinel::inRole('Prof')) {
//                return response($alumnos);
                return view('Situ.hechos.singleHecho.prof')->with('user',$usuario)->with('alumnos',$alumnos);
            }
            elseif(Sentinel::inRole('Inv')) {
//                return response($alumnos);
                $logAccesos= logAccesos::firstOrCreate(['invitado_id'=>$invitado->id,
                    'alumno_id'=>$alumno->id,'hechos_id'=>null],['invitado_id'=>$invitado->id,
                    'alumno_id'=>$alumno->id,'rol'=>$invitado->rol,'hechos_id'=>$id,'numero_accesos'=>'1']);
                $logAccesos->numero_accesos=($logAccesos->numero_accesos)+1;
                $logAccesos->save();

                return view('Situ.hechos.singleHecho')->with('user',$usuario)->with('alumno',$alumno)
                    ->with('hechos',$hechosPublicos);
            }

            elseif(Sentinel::inRole('Alu')) {
                $alumno=$usuario;

                return view('Situ.hechos.singleHecho')->with('user',$usuario)->with('alumno',$alumno)
                    ->with('hechos',$hechosPublicos);
            }

        }



    }



    public function cv()
    {
        if (Sentinel::inRole('Prof') || Sentinel::inRole('Inv')) {
            $usuario = Sentinel::getUser();
            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumnoCv=$invitado->getAlumno()->get()->first();
//        $alumno = Invitados::where('invitado_id', $usuario->id)->get()->first();
            $hecho = hechos::all();
            $formacion=Formacion::where([['user_id',$alumnoCv->id]])->get()->all();
            $laboral=Laboral::where([['user_id',$alumnoCv->id]])->get()->all();

            $categorias = Categorias::all();

//            $categoria = $hecho->getCategoria()->get()->first();

              view()->share('categorias', $categorias);

        } else {
            $alumnoCv = Sentinel::getUser();
//            $hecho = hechos::all();
            $formacion = Formacion::where('user_id', $alumnoCv->id)->get()->all();
            $laboral = Laboral::where('user_id', $alumnoCv->id)->get()->all();

            $categorias = Categorias::all();

//            $categoria = $hecho->getCategoria()->get()->first();

            view()->share('categorias', $categorias);
        }

        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "Portolio profesional de ";
        $view = \View::make('pdf.cv', compact('alumnoCv',  'formacion', 'laboral'))->render();
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
