<?php

namespace App\Http\Controllers;
use App\Invitados;
use App\Laboral;
use DB;
use App\hecho_etiqueta;
use Carbon;
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
//        $etiquetas=Etiqueta::where
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
        $etiquetas=$user->getEtiquetas()->get()->all();
        $etiquetasPublic=Etiqueta::where('user_id',null)->get()->all();
        return view('Alumno.datos.alumnoDatos')->with('user',$user)
            ->with('etiquetas',$etiquetas)->with('etiquetasPublic',$etiquetasPublic)->with('otros_datos', $otros_datos);
    }
    public function alumnoDatosAcademicos ($year=null){

        if(empty($year)){
            $year=1;
        }
        $user = Sentinel::getUser();

        $otros_datos=json_decode($user->otros_datos,true);

        $curso= $user->getDatosAcademicos()->where('curso',$year)->get()->first();
        if(!empty($curso->asignaturas)){
        $asignaturas=$curso->asignaturas;
        }else{
            $asignaturas=array();
        }
        return view('Alumno.datos.alumnoDatosAcademicos')->with('user',$user)
            ->with('otros_datos', $otros_datos)
            ->with('curso',$curso)
            ->with('asignaturas',$asignaturas)->with('year',$year);

    }


    public function actualizarMisDatosAcademicos()
    {
        $user = Sentinel::getUser();
        $cursoAlumno = CursoAlumno::firstOrCreate(['curso' => Input::get('curso'), 'user_id' => $user->id],
            ['curso' => Input::get('curso'), 'user_id' => Input::get('user´_id')]


        );
        $asignaturas = ($cursoAlumno->asignaturas);
        $inputAsignaturas = array();
        for ($i = 0; $i < count(Input::get('asignatura')); $i++) {
            $inputAsignaturas[$i] = Input::get('asignatura')[$i];

        }



        if(!empty(Input::get('asignatura'))){
            if (!empty($asignaturas)  ){
            echo "aaaa";
            $asignaturas = json_decode($cursoAlumno->asignaturas,false);
             $resultado = array_merge($inputAsignaturas, $asignaturas);

           $cursoAlumno->asignaturas = json_encode($resultado,false);
    }
            else{

                $cursoAlumno->asignaturas = json_encode($inputAsignaturas,false);


            }
        }

        else{

            return response("a");
        }


       $cursoAlumno->user_id=$user->id;
       $cursoAlumno->curso=Input::get('curso');
       $cursoAlumno->grado=Input::get('grado');

         $cursoAlumno->save();
        Session::flash('msg', "cambios realizados");

      return Redirect::back();

    }


    public function eliminarAsignatura($asignatura, $year){


        $user=Sentinel::getUser();
        $inputAsignaturas = array();

        $curso= $user->getDatosAcademicos()->where('curso',$year)->first();
        $asignaturas=json_decode($curso->asignaturas,false);
//        $key=array_search($asignatura,$asignaturas);
//            unset($asignaturas[$asignatura]);

        foreach (array_keys($asignaturas, $asignatura) as $key) {
            unset($asignaturas[$key]);


        }
        $resultado = array_merge($inputAsignaturas, $asignaturas);

        $curso->asignaturas = json_encode($resultado,false);
//        if (($key = array_search($asignatura, $asignaturas)) !== false) {
//            unset($asignaturas[$key]);
//        }
//            $curso->asignaturas=json_encode($asignaturas);

        $curso->save();
//        return response(var_dump(  $curso->asignaturas));

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





    public function showFormHecho($categoria)
    {


        $usuario = Sentinel::findById(Sentinel::getUser()->id);
        $curso = $usuario->getDatosAcademicos()->pluck('curso');
        $curso->all();
        $etiqueta=Etiqueta::pluck('slug')->sortByDesc('id');

        $categoria= Categorias::where('categoria', $categoria)->get()->first();
        $otros_datos = json_decode($usuario->otros_datos, true);

        if ($categoria->categoria == 'Calificaciones') {
            return view('hechos.calificaciones')->with('user', Sentinel::getUser())
                ->with('curso', $curso)->with('categoria',$categoria)->with('etiqueta',$etiqueta);

        }
        if ($categoria->categoria == 'Trabajo Académico') {
            return view('hechos.trabajoAcademico')->with('user', Sentinel::getUser())
                ->with('curso', $curso)->with('categoria',$categoria)->with('etiqueta',$etiqueta);
//            return response($categorias->id);

        }
        if ($categoria->categoria == 'Recuerdos') {
            return view('hechos.recuerdos')->with('user', Sentinel::getUser())
                ->with('curso', $curso)->with('categoria',$categoria)->with('etiqueta',$etiqueta)
                ->with('otros_datos',$otros_datos);
//            return response($categorias->id);

        }if ($categoria->categoria == 'Portafolios profesional') {
        return view('Alumno.datos.alumnoDatosLaboral')->with('user', Sentinel::getUser())
            ->with('curso', $curso)->with('categoria',$categoria)->with('etiqueta',$etiqueta)
            ->with('otros_datos',$otros_datos);
//            return response($categorias->id);

    }if ($categoria->categoria == 'Frases guía') {
            $hechos=hechos::where('categoria_id',3)->get();
        return view('hechos.frasesGuia')->with('user', Sentinel::getUser())
            ->with('curso', $curso)->with('categoria',$categoria)->with('etiqueta',$etiqueta)
            ->with('otros_datos',$otros_datos)->with('hechos',$hechos);
//            return response($categorias->id);

    }
        else{
            return "aa";
        }
    }

    public function getAsignaturas($categoria,$curso){
        $usuario= Sentinel::findById(Sentinel::getUser()->id);

        $curso= $usuario->getDatosAcademicos()->where('curso',$curso)->get()->first();

        return response(json_decode($curso->asignaturas));


    }

    public function showInvitarUsuario(Request $request)
    {
        $roles=Role::pluck('Slug','id');

        $usuario = Sentinel::findById(Sentinel::getUser()->id);
        $otros_datos = json_decode($usuario->otros_datos, true);

        return view('Alumno.invitar')->with('user', $usuario)->with('otros_datos', $otros_datos)->withRoles($roles);;

    }



        public function invitarUsuario(Request $request){
            $validation = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',

            ]);

            if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput();
            }
            $usuario = Sentinel::findById(Sentinel::getUser()->id);
            $credentials = [
                'email'    => Input::get('email'),
                'password' => Input::get('password'),
            ];
            $rol=$request['roles'];
            $role=$rol[0];
            $invitado = Sentinel::register($request->all());
            $invitado->roles()->sync([$role]);
            $invitado->permissions = [(Sentinel::findRoleById($role)->name)];
            $invitado->img="/js/tinymce/js/tinymce/plugins/responsive_filemanager/source/user_default.png";

            //INVITADO . A LOS HECHOS QUE QUIERA EL USUARIO
            if($role=='4'){
                $invitado->nivel_acceso='2';
            }
            //PROFESOR . A CURRICULUM

            elseif($role=='3'){

                $invitado->nivel_acceso='3';
            }
            else{

                $invitado->nivel_acceso='4';
            }
            $invitado->save();





            $activation = Activation::create($invitado);
            $activation = Activation::complete($invitado, $activation->code);

            $request['name'];
            $rol=$request['roles'];
            $rol=$rol[0];



            $invitado2=new Invitados();
            $invitado2->invitado_id=$invitado->id;
            $invitado2->alumno_id=$usuario->id;
            $invitado2->nivel_acceso=$invitado->nivel_acceso;
            $invitado2->save();

            if($invitado){
                $invitado->roles()->sync([$rol]);

                Session::flash('message', 'Registration is completed');


                Mail::send('email',['request' => $request->all()],function ($mensaje) use($request){

                    $mensaje->from('jorge.j.gonzalez.93@gmail.com  ',"Site name");
                    $mensaje->subject("Welcome to site name");
                    $mensaje->to($request['email'],$request['name']);


                });
//           return redirect('/');
                return redirect()->back();
            }
            // Session::flash('message', 'There was an error with the registration' );
            //Session::flash('status', 'error');
            return Redirect::back();
        }

    public function alumnoDatosLaborales ($year=null){

        if(empty($year)){
            $year=1;
        }
        $user = Sentinel::getUser();

        $otros_datos=json_decode($user->otros_datos,true);
        $laboral=$user->getLaboral()->get();

        return view('Alumno.datos.alumnoDatosLaboral')->with('user',$user)
            ->with('otros_datos', $otros_datos)->with('year',$year)
            ->with('laboral',$laboral);

    }
    public function actualizarMisDatosLaborales (){

        $user=Sentinel::getUser();
        $alumnoLaboral=new Laboral();
        $alumnoLaboral->user_id=$user->id;
        $alumnoLaboral->sector=Input::get('sector');
        $alumnoLaboral->ubicacion=Input::get('ubicacion');
        $alumnoLaboral->empresa=Input::get('empresa');
        $alumnoLaboral->cargo=Input::get('cargo');

        $alumnoLaboral->descripcion=Input::get('descripcion');
        $format = 'm/d/Y';
        $alumnoLaboral->fecha_inicio = Carbon\Carbon::createFromFormat($format, Input::get('startDate'));

        if(Input::get('endDate')){

            $alumnoLaboral->fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate'));
            $alumnoLaboral->actual = "0";

        }
        else{
            $alumnoLaboral->actual = "1";
        }

            $alumnoLaboral->save();



        $hecho=new hechos();
        $hecho->user_id=$user->id;
        $hecho->titulo_hecho='Trabajo';
        $hecho->categoria_id=5;
        $hecho->curso='';
        $hecho->contenido="";
        $hecho->proposito="";
        $hecho->evidencia="";
        $hecho->hechos_relacionados="";
        $hecho->fecha_inicio=$alumnoLaboral->fecha_inicio;
        $hecho->publico = Input::get('acceso');
        if(Input::get('acceso')=='publico'){
            $hecho->nivel_acceso = "2";

        }else{

            $hecho->nivel_acceso = "1";

        }
        if (isset($request->endDate)) {

            $fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate'));
            $hecho -> fecha_fin= $fecha_fin;

        }
        $hecho->save();
        $etiqueta1=new hecho_etiqueta();
        $etiqueta1->hechos_id=$hecho->id;
        $etiqueta1->etiqueta_id='CV';
        $etiqueta1->save();

        return Redirect::back();


    }

    public function showCrearCategoria(Request $request){

        $etiqueta=Etiqueta::pluck('slug');

        return view('Alumno.crearEtiqueta')->with('etiqueta',$etiqueta);
    }



    public function crearNuevaEtiqueta(Request $request){

        $user=Sentinel::getUser();

        $etiqueta=new Etiqueta();
        $etiqueta->user_id=$user->id;
        $etiqueta->nombre=Input::get('nombre');
        $etiqueta->slug=Input::get('slug');
        $etiqueta->save();


        return redirect()->back();
    }

}
