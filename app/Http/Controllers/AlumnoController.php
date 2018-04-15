<?php

namespace App\Http\Controllers;
use App\Formacion;
use App\Invitados;
use App\Laboral;
use App\logAccesos;
use DB;
use App\hecho_etiqueta;
use Carbon;
use Dompdf\Dompdf;
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
use PhpParser\Node\Scalar\String_;
use Sentinel;
use View;
use Validator;
use Hash;
use Session;
use Illuminate\Support\Facades\Crypt;

use App\CursoAlumno;
use App\Categorias;
class AlumnoController extends Controller

{
    public function __construct()
    {
        //$this->middleware('auth')->except('orders');
        $this->middleware('Alumno');
        $categorias = Categorias::all();
        view()->share('categorias', $categorias);

    }

    public function getDashboard()
    {
        $user = Sentinel::getUser();
        $categorias = Categorias::all();
        $hechos = $user->getHechos()->get();
        $frases = $user->getHechos()->where('categoria_id',3)->get();

        view()->share('categorias', $categorias);
        return view('Alumno.alumnoDashboard')->with('user',$user)->with('frases',$frases)->with('hechos', $hechos)->with('categorias', $categorias);

    }


    public function getHechoUsuario(Request $request)
    {
        $id = $request->id;
        $hecho = hechos::find($id);

        return response($hecho);
    }


    public function alumnoDatos()
    {
        $user = Sentinel::getUser();
        $otros_datos = json_decode($user->otros_datos, true);
        $etiquetas = $user->getEtiquetas()->get()->all();
        $etiquetasPublic = Etiqueta::where('user_id', null)->get()->all();
        $hechos=$user->getHechos()->get();
        $invitados=$user->getInvitados($user->id)->all();
        $profesores=$user->getProfesores($user->id)->all();
        return view('Alumno.datos.alumnoDatos')->with('user', $user)->with('hechos',$hechos)->with('invitados',$invitados)
            ->with('profesores',$profesores)->with('etiquetas', $etiquetas)->with('etiquetasPublic', $etiquetasPublic)->with('otros_datos', $otros_datos);
    }

    public function alumnoDatosAcademicos($year = null)
    {
        $user = Sentinel::getUser();
        if (empty($year)) {
            $year = $user->getDatosAcademicos()->get()->first();

            $grado = $user->getFormacion()->get()->all();
            if(empty($grado)){
                $grado=new Formacion();
                $grado->disciplina_academica="";
                $curso = $user->getDatosAcademicos()->where('grado', $grado->disciplina_academica)->get()->all();

            }
            else {
                $curso = $user->getDatosAcademicos()->where('grado', $grado[0]->disciplina_academica)->get()->all();

            }
        }
        else{
            $year = CursoAlumno::whereNotNull('grado')->where([['user_id',$user->id],['grado',$year]])->get()->first();
            $grado = $user->getFormacion()->get()->all();
            if(empty($year)){
                $curso=1;
            }
            else{
                $curso = $user->getDatosAcademicos()->where('grado', $year->grado)->get()->all();

            }
        }
            $otros_datos = json_decode($user->otros_datos, true);
            if (!empty($grado)) {

                foreach ($grado as $grad) {
                    $gradoArray[$grad['disciplina_academica']] = $grad['disciplina_academica'] . " - " . $grad['titulacion'];
                }
            } else {
                $gradoArray = array();
            }


            if (!empty($curso[0]->asignaturas)) {
                foreach ($curso as $cur) {
                    $asignaturas[$cur->asignaturas] = $cur->asignaturas;
                }
            }else {
                $asignaturas = array();
            }
        return view('Alumno.datos.alumnoDatosAcademicos')->with('user', $user)
            ->with('otros_datos', $otros_datos)
            ->with('curso', $curso)
            ->with('asignaturas', $asignaturas)->with('year', $year)->with('grado',$gradoArray);

    }


    public function actualizarMisDatosAcademicos1()
    {
        $user = Sentinel::getUser();
        $cursoAlumno = CursoAlumno::firstOrCreate(['grado'=>Input::get('grado'), 'user_id' => $user->id],
            ['curso' => Input::get('curso'),'grado'=>Input::get('grado'), 'user_id' => Input::get('user´_id')]
        );
        $asignaturas = ($cursoAlumno->asignaturas);
        $inputAsignaturas = array();
        for ($i = 0; $i < count(Input::get('asignatura')); $i++) {
            $inputAsignaturas[$i] = Input::get('asignatura')[$i];
        }

       if (!empty(Input::get('asignatura'))) {
            if (!empty($asignaturas)) {
                echo "aaaa";
                $asignaturas = json_decode($cursoAlumno->asignaturas, false);
                $resultado = array_merge($inputAsignaturas, $asignaturas);

                $cursoAlumno->asignaturas = json_encode($resultado, false);
            } else {
                $cursoAlumno->asignaturas = json_encode($inputAsignaturas, false);
            }
        } else {
            return response("a");
        }

        $cursoAlumno->user_id = $user->id;
        $cursoAlumno->curso = Input::get('curso');
        $cursoAlumno->grado = Input::get('grado');

        $cursoAlumno->save();
        Session::flash('msg', "cambios realizados");

        return Redirect::back();

    }


    public function actualizarMisDatosAcademicos()
    {
        $user = Sentinel::getUser();


        for($i=0;$i<count(Input::get('asignatura'));$i++){
            $cursoAlumno=new CursoAlumno();

            $cursoAlumno->user_id=$user->id;
            $cursoAlumno->curso=Input::get('curso');
            $cursoAlumno->grado=Input::get('grado');
            $cursoAlumno->asignaturas=Input::get('asignatura')[$i];
            $cursoAlumno->save();

        }

        Session::flash('msg', "cambios realizados");

        return Redirect::back();

    }


    public function actualizarMisDatosFormacion()
    {
        $user = Sentinel::getUser();
        $formacionAlumno=new Formacion();

        $formacionAlumno->user_id=$user->id;
        $formacionAlumno->centro=Input::get('centro');
        $formacionAlumno->ubicacion=Input::get('ubicacion2');
        $formacionAlumno->titulacion=Input::get('titulacion');
        $formacionAlumno->disciplina_academica=Input::get('disciplina_academica');
        $format = 'm/d/Y';
        $formacionAlumno->fecha_inicio = Carbon\Carbon::createFromFormat($format, Input::get('startDate2'));
        if (Input::get('endDate2')) {

            $formacionAlumno->fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate2'));
            $formacionAlumno->actual = "0";

        } else {
            $formacionAlumno->actual = "1";
        }
        if(empty(Input::get('descripcion'))){
            $formacionAlumno->descripcion="Centro: ".$formacionAlumno->centro."
            <br> Ubicacion: ".$formacionAlumno->ubicacion." <br> Titulacion: ". $formacionAlumno->titulacion." Disciplina académica<br>". $formacionAlumno->disciplina_academica."";
        }else {
            $formacionAlumno->descripcion = Input::get('descripcion');

        }
        $formacionAlumno->save();



        $hecho = new hechos();
        $hecho->user_id = $user->id;
        $hecho->titulo_hecho = 'Formacion';
        $hecho->categoria_id = 5;
        $hecho->curso = '';
        $hecho->categoria_nombre="Formación";

        $hecho->contenido =  $formacionAlumno->descripcion;
        $hecho->proposito = "";
        $hecho->evidencia = "";
        $hecho->hechos_relacionados = "";
        $hecho->fecha_inicio = $formacionAlumno->fecha_inicio;
        $hecho->publico = Input::get('acceso2');
        $hecho->formacion_id=$formacionAlumno->id;
        $hecho->etiqueta="CV";
        $dt = Carbon\Carbon::now();
        $hecho->created_at= $dt->toDateString();
        if (Input::get('acceso2') == 'publico') {
            $hecho->nivel_acceso = "2";

        } else {

            $hecho->nivel_acceso = "1";

        }
        if (Input::get('endDate2')) {

            $hecho->fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate2'));

        }
        $hecho->save();
        $etiqueta1 = new hecho_etiqueta();
        $etiqueta1->hechos_id = $hecho->id;
        $etiqueta1->etiqueta_id = 'CV';
        $etiqueta1->save();




        Session::flash('msg', "cambios realizados");

        return Redirect::back();

    }

    public function eliminarAsignatura($asignatura, $year,$curso)
    {


        $user = Sentinel::getUser();
        $inputAsignaturas = array();

        $curso1 = $user->getDatosAcademicos()->where([['curso', $year],['grado',$curso]])->first();
//        return $curso1;
        $asignaturas = json_decode($curso1->asignaturas, false);
//        $key=array_search($asignatura,$asignaturas);
//            unset($asignaturas[$asignatura]);

        foreach (array_keys($asignaturas, $asignatura) as $key) {
            unset($asignaturas[$key]);


        }
        $resultado = array_merge($inputAsignaturas, $asignaturas);

        $curso1->asignaturas = json_encode($resultado, false);
//        if (($key = array_search($asignatura, $asignaturas)) !== false) {
//            unset($asignaturas[$key]);
//        }
//            $curso->asignaturas=json_encode($asignaturas);

        $curso1->save();
//        return response(var_dump(  $curso->asignaturas));

        return Redirect::back();
    }


    public function actualizarMisDatos(Request $request)
    {
        $user = Sentinel::getUser();

        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email=Input::get('email');
        $otros_datos = array('linkedin'=>Input::get('linkedin'),'facebook' => Input::get('facebook'), 'img' => Input::get('imagen'));
        $user->dni=Input::get('dni');
        $user->direccion=Input::get('direccion');
        $user->telefono=Input::get('telefono');
        $user->otros_datos = json_encode($otros_datos);


        $credentials = [
            'email' =>$user->email,
            'password' => Input::get('old_password'),
        ];


        $rules = array(
            'password' => 'confirmed',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            Session::flash('error', "Las contraseñas no coinciden");

            return Redirect::back()->withErrors(['msg', 'The Message']);
        }

        if (Input::get('password') != null) {

            if (Activation::completed($user)) {
                // If it is the case check credentials
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                Session::flash('msg', "cambios realizados");
                return Redirect::back();

            } else {
                return response("fallo al completar");
            }


        } else {
            $user->save();

            Session::flash('msg', "cambios realizados");

            return Redirect::back();
        }


    }


    /**Devuelve el formuñario de creación de un hecho
     Recibe la categoria  , devuelve los cursos de formacion del alumno
     y el grado */

    public function showFormHecho($categoria)
    {


        $usuario = Sentinel::findById(Sentinel::getUser()->id);
          $curso = $usuario->getDatosAcademicos()->pluck('curso');
        $grado = Formacion::selectRaw('disciplina_academica')->where('user_id',$usuario->id)->get()->pluck('disciplina_academica');
        if(count($grado)==0){
            $grado[]=[""=>""];
        }

            $curso1 = $usuario->getDatosAcademicos()->where([['user_id', $usuario->id], ['grado', $grado]])->get()->pluck('curso');

       foreach ($curso1 as $c){
            $c=$usuario->getDatosAcademicos()->where('curso',$c)->get()->first()->asignaturas;

        }


       $curso->all();
        $etiqueta = Etiqueta::pluck('slug')->sortByDesc('id');

        $categoria = Categorias::where('categoria', $categoria)->get()->first();
        $otros_datos = json_decode($usuario->otros_datos, true);

        if ($categoria->categoria == 'Calificaciones') {
//            return response($cursoArray);
            return view('hechos.calificaciones')->with('user', Sentinel::getUser())
                ->with('grado', $grado)->with('curso',$curso1)->with('categoria', $categoria)->with('etiqueta', $etiqueta);

        }
        if ($categoria->categoria == 'Trabajo Académico') {
            return view('hechos.trabajoAcademico')->with('user', Sentinel::getUser())
                ->with('grado', $grado)->with('curso',$curso1)->with('categoria', $categoria)->with('etiqueta', $etiqueta);


        }
        if ($categoria->categoria == 'Recuerdos') {
            return view('hechos.recuerdos')->with('user', Sentinel::getUser())
                ->with('grado', $grado) ->with('curso', $curso1)->with('categoria', $categoria)->with('etiqueta', $etiqueta);

        }
        if ($categoria->categoria == 'Portafolios profesional') {
            return Redirect::to('Alumno/alumnoDatos/datosLaboral/')->with('user', Sentinel::getUser())
                ->with('curso', $curso)->with('categoria', $categoria)->with('etiqueta', $etiqueta)
                ->with('otros_datos', $otros_datos);
//            return response($categorias->id);

        }
        if ($categoria->categoria == 'Frases guía') {
            $hechos = hechos::where('categoria_id', 3)->get();
            return view('hechos.frasesGuia')->with('user', Sentinel::getUser())
                ->with('curso', $curso)->with('categoria', $categoria)->with('etiqueta', $etiqueta)
                ->with('grado', $grado)   ->with('otros_datos', $otros_datos)->with('hechos', $hechos);

        }
        if ($categoria->categoria == 'Proyectos de investigación') {
            return view('hechos.proyectosInvestigacion')->with('user', Sentinel::getUser())
                ->with('grado', $grado)->with('curso',$curso1)->with('categoria', $categoria)->with('etiqueta', $etiqueta);

        }
        else {
            return "aa";
        }
    }

    public function getAsignaturas($categoria,$grado, $curso)
    {
        $usuario = Sentinel::findById(Sentinel::getUser()->id);

        $grado = $usuario->getDatosAcademicos()->where([['curso',$curso],['grado', $grado]])->get()->first();

        return response(($grado->asignaturas));


    }
    public function getCurso(Request $request)
    {
        $usuario = Sentinel::findById(Sentinel::getUser()->id);

        $grado = $usuario->getDatosAcademicos()->distinct('curso')->where('grado', $request->grado)->get()->all();



        if (!empty($grado)) {
            for ($i = 0; $i < count($grado); $i++) {
                $cursoArray[] = $grado[$i]->curso. "º - " . $grado[$i]->asignaturas;
            }
        } else {
            $cursoArray = array();


        }

        return ($cursoArray);

    }


    public function getGrado()
    {
        $usuario = Sentinel::findById(Sentinel::getUser()->id);

        $curso = $usuario->getFormacion()->get()->all();

        return response($curso);


    }
    public function showInvitarUsuario(Request $request)
    {
        $roles = Role::pluck('Slug', 'id');

        $usuario = Sentinel::findById(Sentinel::getUser()->id);
        $otros_datos = json_decode($usuario->otros_datos, true);
        $invitado=$usuario->getProfesores($usuario->id);
        $profesores=$usuario->getInvitados($usuario->id);
        $invitados=$invitado->merge($profesores);
//        return response($invitados);
        return view('Alumno.invitar')->with('user', $usuario)
            ->with('otros_datos', $otros_datos)->withRoles($roles)
            ->with('invitados',$invitados);

    }

    public function logAccesos(){

        $usuario = Sentinel::findById(Sentinel::getUser()->id);
        $otros_datos = json_decode($usuario->otros_datos, true);
        $invitado=$usuario->getProfesores($usuario->id);
        $profesores=$usuario->getInvitados($usuario->id);
        $invitados=$invitado->merge($profesores);
        $logAccesos=logAccesos::where('alumno_id',$usuario->id)->get()->all();


        $view = \View::make('pdf.logAccesos', compact('invitados',  'usuario','logAccesos'))->render();
        $pdf = \App::make('dompdf.wrapper');


        $pdf->loadHTML($view);
        return $pdf->stream('invoice');


    }

    /*Invitacion a Profesores e Invitados por parte del alumno
    Cada Invitado-Profesor tiene un Rol y un Nivel de acceso

    Envia un email a cada invitado */

    public function invitarUsuario(Request $request)
    {
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
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        ];
        $rol = $request['roles'];
        $role = $rol[0];
        $invitado = Sentinel::register($request->all());
        $invitado->roles()->sync([$role]);
        $invitado->permissions = [(Sentinel::findRoleById($role)->name)];
//        $invitado->img = "/js/tinymce/js/tinymce/plugins/responsive_filemanager/source/user_default.png";
        $otros_datos=array('linkedin'=>'','facebook'=>'','img'=>'/js/tinymce/js/tinymce/plugins/responsive_filemanager/source/user_default.png',);
        $invitado->otros_datos=json_encode($otros_datos);

        //INVITADO . A LOS HECHOS QUE QUIERA EL USUARIO
        if ($role == '4') {
            $invitado->nivel_acceso = '2';
        } //PROFESOR . A CURRICULUM

        elseif ($role == '3') {

            $invitado->nivel_acceso = '3';
        } else {

            $invitado->nivel_acceso = '4';
        }

        $invitado->save();


        $activation = Activation::create($invitado);
        $activation = Activation::complete($invitado, $activation->code);

        $request['name'];
        $rol = $request['roles'];
        $rol = $rol[0];


        $invitado2 = new Invitados();
        $invitado2->invitado_id = $invitado->id;
        $invitado2->alumno_id = $usuario->id;
        $invitado2->nivel_acceso = $invitado->nivel_acceso;
       $invitado2->rol=$invitado->roles()->get()->first()->name;
        $invitado2->fecha_limite=Carbon\Carbon::parse(Input::get('fecha_limite'));
        $invitado2->save();

        if ($invitado) {
            $invitado->roles()->sync([$rol]);
            Session::flash('message', 'Registration is completed');

            $encrypted = encrypt($request['password']);


            if($invitado2->rol=='Invitado') {


                $data = array('alumno'=>$invitado2->getAlumno()->get()->first()->first_name,'first_name' => $request['first_name'], 'email' => $request['email'], 'encrypted' => $encrypted,
                );
            }elseif($invitado2->rol=='Profesor') {
                $data = array('profesor'=>$usuario->first_name,'first_name' => $request['first_name'], 'email' => $request['email'], 'encrypted' => $encrypted,
                );
            }
               else {
                $data = array('first_name' => $request['first_name'], 'email' => $request['email'], 'encrypted' => $encrypted,
                );
            }
            Mail::send('email', $data,function ($mensaje) use($data){

                $mensaje->from('jorge.j.gonzalez.93@gmail.com  ',"Site name");
                $mensaje->subject("Has sido invitado a SITU");
                $mensaje->to($data['email'],$data['first_name']);


            });
            return redirect()->back();
        }

        return Redirect::back();
    }

    public function alumnoDatosLaborales($year = null)
    {

        if (empty($year)) {
            $year = 1;
        }
        $user = Sentinel::getUser();

        $otros_datos = json_decode($user->otros_datos, true);
        $laboral = $user->getLaboral()->get();
        $formacion = $user->getFormacion()->get();

        return view('Alumno.datos.alumnoDatosLaboral')->with('user', $user)
            ->with('otros_datos', $otros_datos)->with('year', $year)
            ->with('laboral', $laboral)->with('formacion',$formacion);

    }

    public function actualizarMisDatosLaborales()
    {
        $user = Sentinel::getUser();
        $alumnoLaboral = new Laboral();
        $alumnoLaboral->user_id = $user->id;
        $alumnoLaboral->sector = Input::get('sector');
        $alumnoLaboral->ubicacion = Input::get('ubicacion');
        $alumnoLaboral->empresa = Input::get('empresa');
        $alumnoLaboral->cargo = Input::get('cargo');
        if(empty(Input::get('descripcion'))){
            $alumnoLaboral->descripcion="Sector: ".$alumnoLaboral->sector."
            <br> Ubicacion: ".$alumnoLaboral->ubicacion." <br> Empresa: ". $alumnoLaboral->empresa." Cargo<br>". $alumnoLaboral->cargo."";
        }else {
            $alumnoLaboral->descripcion = Input::get('descripcion');

        }
        $format = 'm/d/Y';
        $alumnoLaboral->fecha_inicio = Carbon\Carbon::createFromFormat($format, Input::get('startDate'));

        if (Input::get('endDate')) {

            $alumnoLaboral->fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate'));
            $alumnoLaboral->actual = "0";

        } else {
            $alumnoLaboral->actual = "1";
        }

        $alumnoLaboral->save();


        $hecho = new hechos();
        $hecho->user_id = $user->id;
        $hecho->titulo_hecho = 'Trabajo';
        $hecho->categoria_id = 5;
        $hecho->categoria_nombre="Portafolios profesional";
        $hecho->curso = '';
        $hecho->contenido = $alumnoLaboral->descripcion;
        $hecho->proposito = "";
        $hecho->evidencia = "";
        $hecho->etiqueta="CV";
        $dt =  Carbon\Carbon::now();
        $hecho->created_at= $dt->toDateString();
        $hecho->hechos_relacionados = "";
        $hecho->fecha_inicio = $alumnoLaboral->fecha_inicio;
        $hecho->publico = Input::get('acceso');
        $hecho->laboral_id=$alumnoLaboral->id;
        if (Input::get('acceso') == 'publico') {
            $hecho->nivel_acceso = "2";

        } else {

            $hecho->nivel_acceso = "1";

        }
        if (isset($request->endDate)) {

            $fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate'));
            $hecho->fecha_fin = $fecha_fin;

        }
        $hecho->save();
        $etiqueta1 = new hecho_etiqueta();
        $etiqueta1->hechos_id = $hecho->id;
        $etiqueta1->etiqueta_id = 'CV';
        $etiqueta1->save();

        return Redirect::back();
    }

    public function showCrearCategoria(Request $request)
    {

        $etiqueta = Etiqueta::pluck('slug');

        return view('Alumno.crearEtiqueta')->with('etiqueta', $etiqueta);
    }
    public function crearNuevaEtiqueta(Request $request)
    {

        $user = Sentinel::getUser();

        $etiqueta = new Etiqueta();
        $etiqueta->user_id = $user->id;
        $etiqueta->nombre = Input::get('nombre');
        $etiqueta->slug = Input::get('slug');
        $etiqueta->save();


        return redirect()->back();
    }


    public function actualizaAcceso(Request $request)
    {
        $user = Sentinel::getUser();
        $hecho = hechos::where('id', $request->hecho)->first();
        if  (($hecho->publico)== "publico"){
            $hecho->nivel_acceso = "1";
            $hecho->publico = "privado";


        }
        else{

            $hecho->nivel_acceso = "2";
            $hecho->publico = "publico";
//            return response("bb");

        }

        $hecho->update();
       return response($hecho);
    }

    public function actualizarFecha(Request $request)
    {
        $user = Sentinel::getUser();
        $invitado = Invitados::where('id', $request->id)->first();
//        return response($hecho->nivel_acceso);
       $invitado->fecha_limite=Carbon\Carbon::parse($request->fecha);


        $invitado->update();
        return response($invitado);
    }
}
