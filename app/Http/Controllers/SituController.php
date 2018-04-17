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
        $etiquetasAll=Etiqueta::whereNull('user_id')->get()->all();
        if(Sentinel::check()) {
            if (is_null($id) && is_null($categoria)) {
                $usuario = Sentinel::getUser();

                if (Sentinel::inRole('Prof')) {
                    $usuario = Sentinel::getUser();

                    $rol = Sentinel::findRoleById(2);
                    $alumnos = $rol->users()->with('roles')->get();
                    $hechosPublicos = hechos::where('nivel_acceso', '>=', $usuario->nivel_acceso)->get()->all();

                } elseif (Sentinel::inRole('Inv')) {

                    $invitado = Invitados::where('invitado_id', $usuario->id)->get()->first();
                    $alumno = $invitado->getAlumno()->get()->first();
                    $hecho = hechos::all();
                    $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso], ['user_id', $alumno->id]])->get()->all();


                } else {
                    $alumno = $usuario;

                    $hecho = hechos::all();
                    $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso], ['user_id', $alumno->id]])->get()->all();

                }
                $categorias = Categorias::all();
                view()->share('categorias', $categorias);

            } /*ACCESO A LA PARTE DEL CURRICULUM*/
            elseif ($id == 0 && !is_null($categoria)) {

                $usuario = Sentinel::getUser();
                $alumno = Invitados::where('invitado_id', $usuario->id)->get()->first();

                $hecho = hechos::find($id);
                if (Sentinel::inRole('Prof')) {

                    $invitado = Invitados::where('invitado_id', $usuario->id)->get()->first();
                    $alumno = Sentinel::findById($alu);
//                    $invitado->alumno_id = $alu;
//                    $invitado->update();
                    $alumno = $invitado->getAlumno()->get()->first();

                    $rol = Sentinel::findRoleById(2);
                    $alumnos = $rol->users()->with('roles')->get();
                    $hechosPublicos = hechos::where([['user_id', $alumno->id]])->get();
                    $otrosHechosPublicos = $hechosPublicos;
                    $hechosPublicos = hechos::where('user_id', $alumno->id)
                        ->where('etiqueta', 'like', 'CV%')
                        ->get()->all();
                    $logAccesos = logAccesos::firstOrCreate(['invitado_id' => $invitado->id,
                        'alumno_id' => $alumno->id, 'hechos_id' => null], ['invitado_id' => $invitado->id,
                        'alumno_id' => $alumno->id, 'rol' => $invitado->rol, 'hechos_id' => $id, 'numero_accesos' => '0']);
                    $logAccesos->numero_accesos = ($logAccesos->numero_accesos) + 1;
                    $logAccesos->save();
                    $categorias = Categorias::all();

                } else {

                    $hechosPublicos = hechos::where([['nivel_acceso', '>=', $usuario->nivel_acceso],
                        ['categoria_id', $categoria], ['user_id', $usuario->id]])->get()->all();
                    $otrosHechosPublicos = $hechosPublicos;

                }
                $categoria = Categorias::where('id', $categoria)->get()->first();
                $categorias = Categorias::all();

                view()->share('categorias', $categorias);
            } else {

                $usuario = Sentinel::getUser();
                $invitado = Invitados::where('invitado_id', $usuario->id)->get()->first();
                $categorias = Categorias::all();

                $hecho = hechos::find($id);
                if (Sentinel::inRole('Prof')) {
                    $alumno = $invitado->getAlumno()->get()->first();
                    $hechosPublicos = hechos::where('user_id', $alumno->id)
                        ->where('etiqueta', 'like', 'CV%')
                        ->get()->all();
                    if(count($hechosPublicos)>0){
//                    $hechosPublicos = $hechosPublicos->getEtiqueta()->with('CV');
                    }
                    $categoria=$categoria;
                    $otrosHechosPublicos = $hechosPublicos;

                } else {
                    if (Sentinel::inRole('Inv')) {
                        $alumno = $invitado->getAlumno()->get()->first();
                        $logAccesos = logAccesos::firstOrCreate(['invitado_id' => $invitado->id,
                            'alumno_id' => $alumno->id, 'hechos_id' => $id], ['invitado_id' => $invitado->id,
                            'alumno_id' => $alumno->id, 'rol' => $invitado->rol, 'hechos_id' => $id, 'numero_accesos' => '0']);
                        $logAccesos->numero_accesos = ($logAccesos->numero_accesos) + 1;
                        $logAccesos->save();
                    } else {
                        $alumno = $usuario;

                    }

                    $hechosPublicos = hechos::where([['user_id', $alumno->id], ['nivel_acceso', '>=', $usuario->nivel_acceso],
                        ['categoria_id', $categoria]])->get()->all();
                    $otrosHechosPublicos = hechos::where([['user_id', $alumno->id], ['nivel_acceso', '>=', $usuario->nivel_acceso],
                        ['categoria_id', $categoria], ['id', '!=', $hecho->id]])->get()->all();
                    $categoria = $hecho->getCategoria()->get()->first();
                    $curso = $hecho->curso;
                    $categorias = Categorias::all();

                    view()->share('categorias', $categorias);
                }
            }
            $otros_datos = json_decode($usuario->otros_datos, true);
            if (isset($categoria)) {
                if ($categoria->categoria == 'Calificaciones') {
                    return view('Situ.hechos.singleHecho.calificacion')->with('hecho', $hecho)
                        ->with('hechos', $hechosPublicos)->with('user', $usuario)->with('alumno', $alumno)
                        ->with('otrosHechos', $otrosHechosPublicos);


                }
                if ($categoria->categoria == 'Trabajo Académico') {
                    return view('Situ.hechos.singleHecho.trabajoAcademico')->with('hecho', $hecho)
                        ->with('hechos', $hechosPublicos)->with('hechos', $hechosPublicos)->with('user', $usuario)
                        ->with('alumno', $alumno)->with('otrosHechos', $otrosHechosPublicos);

                }
                if ($categoria->categoria == 'Recuerdos') {
                    return view('Situ.hechos.singleHecho.recuerdos')->with('hecho', $hecho)
                        ->with('hechos', $hechosPublicos)->with('hechos', $hechosPublicos)->with('user', $usuario)
                        ->with('alumno', $alumno)->with('otrosHechos', $otrosHechosPublicos);


                }
                if ($categoria->categoria == 'Portafolios profesional') {

                    return view('Situ.hechos.singleHecho.portafolioProfesional')->with('hecho', $hecho)
                        ->with('hechos', $hechosPublicos)->with('user', $usuario)
                        ->with('alumno', $alumno)->with('otrosHechos', $otrosHechosPublicos);

                }
                if ($categoria->categoria == 'Frases guía') {
                    return view('Situ.hechos.singleHecho.fraseGuia')->with('hecho', $hecho)->with('hechos', $hechosPublicos)
                        ->with('hechos', $hechosPublicos)->with('user', $usuario)->with('alumno', $alumno)
                        ->with('otrosHechos', $otrosHechosPublicos);
                }
                if ($categoria->categoria == 'Proyectos de investigación') {
                    return view('Situ.hechos.singleHecho.proyectosInvestigacion')->with('hecho', $hecho)
                        ->with('hechos', $hechosPublicos)->with('hechos', $hechosPublicos)->with('user', $usuario)
                        ->with('alumno', $alumno)->with('otrosHechos', $otrosHechosPublicos);
                }
            } else {
                if (Sentinel::inRole('Prof')) {
//                return response($alumnos);
                    return view('Situ.hechos.singleHecho.prof')->with('user', $usuario)->with('alumnos', $alumnos)->with('etiquetas', $etiquetasAll);
                } elseif (Sentinel::inRole('Inv')) {
//                return response($alumnos);
                    $logAccesos = logAccesos::firstOrCreate(['invitado_id' => $invitado->id,
                        'alumno_id' => $alumno->id, 'hechos_id' => null], ['invitado_id' => $invitado->id,
                        'alumno_id' => $alumno->id, 'rol' => $invitado->rol, 'hechos_id' => $id, 'numero_accesos' => '1']);
                    $logAccesos->numero_accesos = ($logAccesos->numero_accesos) + 1;
                    $logAccesos->save();

                    return view('Situ.hechos.singleHecho')->with('user', $usuario)->with('alumno', $alumno)
                        ->with('hechos', $hechosPublicos)->with('etiquetas', $etiquetasAll)->with('categorias',$categorias);
                } elseif (Sentinel::inRole('Alu')) {
                    $alumno = $usuario;

                    return view('Situ.hechos.singleHecho')->with('user', $usuario)->with('alumno', $alumno)
                        ->with('hechos', $hechosPublicos)->with('etiquetas', $etiquetasAll)->with('categorias',$categorias);;
                }

            }
        }
        else{
            return \redirect('login');
        }


    }

    public function getHechos(Request $request){

            $usuario=Sentinel::getUser();
        if (Sentinel::inRole('Inv')){

            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();

            $otros_datos=json_decode($alumno->otros_datos);
            $otros_datos=array('img'=>$otros_datos->img);
            $first_name=($alumno->first_name);
            $first_name=array('first_name'=>$first_name);
            $hechosPublicos1 = hechos::whereRaw('user_id='.  $alumno->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
                ->where('contenido','like', '%' . $request->input . '%')
                ->orderBy($request->orden)
                ->get()->all();
            $hechosPublicos2 = hechos::whereRaw('user_id='.  $alumno->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
                ->where('etiqueta','like', '%' . $request->input . '%')
                ->Orwhere('categoria_id',$request->input)
                ->orderBy($request->orden)
                ->get()->all();
            $hechosPublicos3 = hechos::whereRaw('user_id='.  $alumno->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
                ->where('categoria_id',$request->input)
                ->orderBy($request->orden)
                ->get()->all();

            $hechosPublicos=array_merge($hechosPublicos1,$hechosPublicos2,$hechosPublicos3);


        }elseif(Sentinel::inRole('Prof')){


            $rol=Sentinel::findRoleById(2);
            $alumnos=$rol->users()->with('roles')->where('first_name','like', '%' . $request->input . '%')->get()->all();


            return response($alumnos);




        }else{
            $otros_datos=json_decode($usuario->otros_datos);
            $otros_datos=array('img'=>$otros_datos->img);
            $first_name=($usuario->first_name);
            $first_name=array('first_name'=>$first_name);
            $hechosPublicos1 = hechos::whereRaw('hechos.user_id='.$usuario->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
                ->where('contenido','like', '%' . $request->input . '%')
                ->orderBy($request->orden)
                ->get()->all();
            if(count($hechosPublicos1)>0) {



            }
            $hechosPublicos2 = hechos::whereRaw('hechos.user_id='.$usuario->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
                ->where('etiqueta','like', '%' . $request->input . '%')
                ->Orwhere('categoria_id',$request->input)
                ->orderBy($request->orden)
                ->get()->all();
            if(count($hechosPublicos2)>0) {

            }

                $hechosPublicos3 = hechos::whereRaw('hechos.user_id='.$usuario->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
               ->where('categoria_id',$request->input)
                ->orderBy($request->orden)
                ->get()->all();
            if(count($hechosPublicos3)>0) {


            }
            $hechosPublicos4 = hechos::whereRaw('hechos.user_id='.$usuario->id)->whereRaw('hechos.nivel_acceso >='.$usuario->nivel_acceso)
                ->where('titulo_hecho','like', '%' . $request->input . '%')
                ->orderBy($request->orden)
                ->get()->all();
            if(count($hechosPublicos4)>0) {


            }
            //FALTA EL ARRAY ADD
            $hechosPublicos=array_merge($hechosPublicos1,$hechosPublicos2,$hechosPublicos3,$hechosPublicos4);
        }





            return response()->json([ array_unique($hechosPublicos),$otros_datos,$first_name]);
    }
    public function getCategorias(Request $request){

        $usuario=Sentinel::getUser();

        if (Sentinel::inRole('Inv')){

            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();
            $otros_datos=json_decode($alumno->otros_datos);
            $otros_datos=array('img'=>$otros_datos->img);
            $first_name=($alumno->first_name);
            $first_name=array('first_name'=>$first_name);
            $hechosPublicos = hechos::where('user_id',  $alumno->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',$request->input)->get()->all();
        }elseif(Sentinel::inRole('Prof')){


            $rol=Sentinel::findRoleById(2);
            $alumnos=$rol->users()->with('roles')->where('first_name','like', '%' . $request->input . '%')->get()->all();


            return response($alumnos);




        }else{
            $otros_datos=json_decode($usuario->otros_datos);
            $otros_datos=array('img'=>$otros_datos->img);
            $first_name=($usuario->first_name);
            $first_name=array('first_name'=>$first_name);
            $hechosPublicos = hechos::where('user_id',$usuario->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)
                ->where('categoria_id',$request->input)
                ->orderBy($request->orden)
                ->get()->all();

        }





        return response()->json([ array_unique($hechosPublicos),$otros_datos,$first_name]);
    }

    public function getCalificaciones(){
        $categorias = Categorias::all();

        $usuario=Sentinel::getUser();
        if (Sentinel::inRole('Inv')){
            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();
            $calificaciones = hechos::where('user_id',  $alumno->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',2)
               ->get();
            return view('Situ.hechos.singleHecho.calificaciones')->with('calificaciones',$calificaciones)->with('alumno',$alumno)->with('usuario',$usuario)
                ->with('categorias',$categorias);


        }






        else{

                $calificaciones = hechos::where('user_id',  $usuario->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',2)
                ->get()->all();
            return view('Situ.hechos.singleHecho.calificaciones')->with('calificaciones',$calificaciones)->with('user',$usuario)
                ->with('categorias',$categorias);

        }





    }

    public function getTrabajosAcademicos(){
        $categorias = Categorias::all();

        $usuario=Sentinel::getUser();
        if (Sentinel::inRole('Inv')){
            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();
            $trabajos = hechos::where('user_id',  $alumno->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',1)
                ->get()->all();
            return view('Situ.hechos.singleHecho.trabajosAcademicos')->with('trabajos',$trabajos)->with('alumno',$alumno)->with('usuario',$usuario)
                ->with('categorias',$categorias);


        }






        else{

            $trabajos = hechos::where('user_id',  $usuario->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',1)
                ->get()->all();
            return view('Situ.hechos.singleHecho.trabajosAcademicos')->with('trabajos',$trabajos)->with('user',$usuario)
                ->with('categorias',$categorias);

        }





    }

    public function getRecuerdos(){
        $categorias = Categorias::all();

        $usuario=Sentinel::getUser();
        if (Sentinel::inRole('Inv')){
            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();
            $recuerdos = hechos::where('user_id',  $alumno->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',7)
                ->get()->all();
            return view('Situ.hechos.singleHecho.recuerdosAll')->with('recuerdos',$recuerdos)->with('alumno',$alumno)->with('usuario',$usuario)
                ->with('categorias',$categorias);


        }






        else{

            $recuerdos = hechos::where('user_id',  $usuario->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',7)
                ->get()->all();
            return view('Situ.hechos.singleHecho.recuerdosAll')->with('recuerdos',$recuerdos)->with('user',$usuario)
                ->with('categorias',$categorias);

        }





    }

    public function getProyectos(){
        $categorias = Categorias::all();

        $usuario=Sentinel::getUser();
        if (Sentinel::inRole('Inv')){
            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();
            $proyectos = hechos::where('user_id',  $alumno->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',6)
                ->get()->all();
            return view('Situ.hechos.singleHecho.proyectosInvestigacionAll')->with('proyectos',$proyectos)->with('alumno',$alumno)->with('usuario',$usuario)
                ->with('categorias',$categorias);


        }






        else{

            $proyectos = hechos::where('user_id',  $usuario->id)->where('nivel_acceso', '>=', $usuario->nivel_acceso)->where('categoria_id',6)
                ->get()->all();
            return view('Situ.hechos.singleHecho.proyectosInvestigacionAll')->with('proyectos',$proyectos)->with('user',$usuario)
                ->with('categorias',$categorias);

        }





    }

    public function getOrden(Request $request){

        $usuario=Sentinel::getUser();
        if (Sentinel::inRole('Inv')){
            $invitado=Invitados::where('invitado_id',$usuario->id)->get()->first();
            $alumno = $invitado->getAlumno()->get()->first();
            $hechosPublicos = hechos::where([['user_id',  $alumno->id],['nivel_acceso', '>=', $usuario->nivel_acceso],
            ])  ->where('contenido','like', '%' . $request->input . '%')->get()->all();
        }elseif(Sentinel::inRole('Prof')){


            $rol=Sentinel::findRoleById(2);
            $alumnos=$rol->users()->with('roles')->where('first_name','like', '%' . $request->input . '%')->get()->all();


            return response($alumnos);




        }else{
            $hechosPublicos = hechos::where('nivel_acceso', '>=', $usuario->nivel_acceso)

                ->orderBy($request->orden)
                ->get()->all();
        }





        return response($hechosPublicos);
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
