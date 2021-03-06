<?php

namespace App\Http\Controllers;
use App\Etiqueta;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
use File;
use App\Invitados;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Role;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Router;
use View;
use Response;
use Validator;
use Json;
use Hash;
use Mail;
class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('orders');
        $this->middleware('Admin');
    }

    public function getDashboard(){

        $users=User::all();
        $etiquetas=Etiqueta::all();
        return view('Admin.adminDashboard')->with('users',$users)->with('etiquetas',$etiquetas);

    }



    public function loginSentinel(Request $request){


        $user = Sentinel::getUser();

        return view('Admin.Admin')->withUser($user);


    }




    public function getNuevoUsuario(){

        $roles=Role::where('Slug','<>','Inv')->pluck('slug','id');
        return view('Admin/nuevoUsuario')->with('roles' , $roles);


    }


    public function register(Request $request)
    {

                $validation = Validator::make($request->all(), [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'permissions' => 'string|min:6|confirmed',
                ]);

                if ($validation->fails()) {
                    return Redirect::back()->withErrors($validation)->withInput();
                }
                $rol = $request['roles'];
                $role = $rol[0];
                \Log::info($rol);

                $user = Sentinel::register($request->all());
                $user->roles()->sync([$role]);
                $user->permissions = [(Sentinel::findRoleById($role)->name)];
                $user->save();

             //Activate the user **
                 $activation = Activation::create($user);
                $activation = Activation::complete($user, $activation->code);
             //End activation
                $request['name'];
                $rol = $request['roles'];
                $rol = $rol[0];
                if ($user) {
                    $user->roles()->sync([$rol]);

                    Session::flash('message', 'Registration is completed');
                    Session::flash('status', 'success');                    Session::flash('status', 'success');

                    //            $role = Sentinel::findRoleBySlug($rol);
        //            $role->users()->attach($user);


                    Mail::send('email', ['request' => $request->all()], function ($mensaje) use ($request) {

                        $mensaje->from('jorge.j.gonzalez.93@gmail.com  ', "SITU");
                        $mensaje->subject("BIenvenido a SITU");
                        $mensaje->to($request['email'], $request['name']);


                    });
        //           return redirect('/');
                    return Redirect::back();
                }
         Session::flash('message', 'There was an error with the registration' );
        Session::flash('status', 'error');
        return Redirect::back();
}


/* Ver el usuario - invitado o profesor , @return View*/


    public function verUsuario($usuario)
    {

        $user=Sentinel::findById($usuario);

        if($user->permissions[0]=='Alumno'){
            $etiquetas = $user->getEtiquetas()->get()->all();

        }
        else{
            $etiquetas = array();

        }
        $json= Sentinel::findById($usuario);
        $otros_datos=json_decode($json->otros_datos,true);
        $hechos=$user->getHechos()->get()->all();
        $invitados=$user->getInvitados($user->id)->all();
        $profesores=$user->getProfesores($user->id)->all();
        $etiquetasPublic = Etiqueta::where('user_id', null)->get()->all();

        return view('Admin.setUsuario')->with('user', Sentinel::findById($usuario))->with('hechos',$hechos)
         ->with('etiquetas',$etiquetas)  ->with('etiquetasPublic',$etiquetasPublic) ->with('otros_datos', $otros_datos)->with('profesores',$profesores)->with('invitados',$invitados);
    }

    public function eliminarEtiquetaAdmin(Request $request){


        $etiqueta=Etiqueta::where('id',$request->id);

        $etiqueta->delete();


        return "eliminado";

    }

    public function actualizarUsuario($email,$rol)
    {

        $user = User::where('email',$email)->where('permissions[0]',$rol)->get();

        $validation = Validator::make(Input::all());

        if ($validation->fails()) {
            return Redirect::back()->with('message', 'Error al actualizar Usuario');
        } else {

            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');

            $user->save();

            Session::flash('success', ' Actualizado con éxito');

            return Redirect::back();


        }
    }
    public function getActualizarUsuario(Request $request){
    $credentials =array('login' =>$request->email);
   $usuario = Sentinel::findByCredentials($credentials);
    $usuario=User::where('email',$request->email)->where('permissions','like',"%".$request->rol."%")->get()->first();
      return response($usuario->id);
    }




    public function crearNuevaEtiqueta(Request $request){
        $validation = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'slug' => 'required|string|max:255',

        ]);

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }


        Etiqueta::create($request->all());

        return Redirect::to('Admin/adminDashboard');
    }



    /*Actualizar la fecha limite de acceso */
    function autogenerar_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
    function eliminarUsuario(Request $request ) {

        $user=User::where('id',$request->id)->get()->first();
//        return $user->roles()->get();
        if($user->roles()->get()->first()->name == "Alumno"){
            $hechos=$user->getHechos()->get()->all();
            $invitados=$user->getInvitados($request->id);
            $usuariosInvitados=array();
            foreach($invitados as $invitado){
                $usuariosInvitado=$invitado->getUsuario()->get()->first();
//                array_push($usuariosInvitados,$usuariosInvitado);

                $usuariosInvitado->delete();

            }
            foreach($invitados as $invitado){
                $invitado=Invitados::where('id',$invitado->id)->get()->first();
                $invitado->delete();

            }
            foreach($hechos as $hecho){

                $hecho->delete();

            }
            $formacion=$user->getFormacion()->get()->all();
            foreach($formacion as $f){

                $f->delete();

            }
            $laboral=$user->getLaboral()->get()->all();
            foreach($laboral as $l){

                $l->delete();

            }
            $etiquetas=$user->getEtiquetas()->get()->all();

            foreach($etiquetas as $e){

                $e->delete();

            }
            $datosAcademicos=$user->getDatosAcademicos()->get()->all();
            foreach($datosAcademicos as $dAcademicos){

                $dAcademicos->delete();

            }
            User::destroy($user->id);
            $user->destroy($user->id);
            //            $user->delete();

            return "destruido";

        }else{
            User::destroy($user->id);
            $user->destroy($user->id);
        }


    }

    public function actualizarFecha(Request $request)
    {
//        $invitado = Invitados::where('id', $request->id)->first();
////        return response($hecho->nivel_acceso);
//        $invitado->fecha_limite=Carbon\Carbon::parse($request->fecha);
//
//
//        $invitado->update();
//        return response($invitado);


        $user = Sentinel::getUser();
        $invitado = Invitados::where('id', $request->id)->first();
        $user= User::where('id', $invitado->invitado_id)->get()->first();
//        return response($hecho->nivel_acceso);
        $invitado->fecha_limite=Carbon\Carbon::parse($request->fecha);
        $password=$this->autogenerar_password();
        $encrypted = encrypt($password);


        $user->password = Hash::make($password);
        $user->update();
        $invitado->update();
        if($invitado->rol=='Invitado')
        $data = array('alumno'=>$invitado->getAlumno()->get()->first()->first_name,'invitado'=>$invitado,'first_name' => $invitado->getUsuario()->get()->first()->first_name, 'email' => $invitado->getUsuario()->get()->first()->email, 'encrypted' => $encrypted,
//
        );
        elseif($invitado->rol=='Profesor') {
            $data = array('profesor'=>$invitado,'invitado'=>$invitado,'first_name' => $invitado->getUsuario()->get()->first()->first_name, 'email' =>$invitado->getUsuario()->get()->first()->email, 'encrypted' => $encrypted,);

        }
        $link=  url('accesoDirecto/'.$request["email"].'/'.$encrypted.'/');
        $fs= File::put($invitado->getUsuario()->get()->first()->first_name.'_accesoSItu.txt',url('loginInv'.'/'.$invitado->getUsuario()->get()->first()->email.'/'.$encrypted));
        $file= public_path(). "/".$invitado->getUsuario()->get()->first()->first_name.'_accesoSItu.txt';

        $headers = array(
            'Content-Type: application/pdf',
        );
        Mail::send('emailFecha', $data,function ($mensaje) use($data,$link,$invitado,$request,$encrypted){

            $mensaje->from('jorge.j.gonzalez.93@gmail.com  ',"SITU");
            $mensaje->subject("Has sido invitado a SITU");
            $mensaje->to($data['email'],$data['first_name']);
//           $mensaje->attach($link,['as' => 'SITU_'.$invitado->getAlumno()->get()->first()->first_name.'.html',
//                'mime' => 'text/html']);



        });
        return Response::download($file, 'Acceso_SITU.txt', $headers);


    }





    public function create()
    {
        return View::make('user.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User;

        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');
        $user->username   = Input::get('username');
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));

        $user->save();

        return Redirect::to('/user');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return View::make('user.edit', [ 'user' => $user ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);

        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');
        $user->username   = Input::get('username');
        $user->email      = Input::get('email');
        $user->password   = Hash::make(Input::get('password'));

        $user->save();

        return Redirect::to('/user');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return Redirect::to('/user');
    }


}
