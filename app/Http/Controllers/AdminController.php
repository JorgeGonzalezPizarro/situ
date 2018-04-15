<?php

namespace App\Http\Controllers;
use App\Etiqueta;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\User;
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
class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('orders');
        $this->middleware('Admin');
    }

    public function getDashboard(){

        $users=User::all();
        return view('Admin.adminDashboard')->with('users',$users);

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

                        $mensaje->from('jorge.j.gonzalez.93@gmail.com  ', "Site name");
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
        $json= Sentinel::findById($usuario);
        $otros_datos=json_decode($json->otros_datos,true);
        $hechos=$user->getHechos()->get()->all();
        $invitados=$user->getInvitados($user->id)->all();
        $profesores=$user->getProfesores($user->id)->all();
        $etiquetasPublic = Etiqueta::where('user_id', null)->get()->all();
        $etiquetas = $user->getEtiquetas()->get()->all();

        return view('Admin.setUsuario')->with('user', Sentinel::findById($usuario))->with('hechos',$hechos)
         ->with('etiquetas',$etiquetas)  ->with('etiquetasPublic',$etiquetasPublic) ->with('otros_datos', $otros_datos)->with('profesores',$profesores)->with('invitados',$invitados);
    }
    public function actualizarUsuario($email)
    {

        $user = User::find($email);

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


    public function actualizarFecha(Request $request)
    {
        $invitado = Invitados::where('id', $request->id)->first();
//        return response($hecho->nivel_acceso);
        $invitado->fecha_limite=Carbon\Carbon::parse($request->fecha);


        $invitado->update();
        return response($invitado);
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
