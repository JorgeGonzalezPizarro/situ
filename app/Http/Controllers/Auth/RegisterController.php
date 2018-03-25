<?php

namespace App\Http\Controllers\Auth;

use App\CursoAlumno;
use App\Invitados;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Redirect;
use Sentinel;
use Session;
use Activation;
use Mail;

use Cartalyst\Sentinel\Users;
use Cartalyst\Sentinel\Roles\EloquentRole;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    
    public function showRegistrationForm()
    {
//        $role= new Role();
//        $roles=Role::select('Slug')->get();
        $roles=Role::pluck('Slug','id');

//        $roles=$role->getRoleSlug();
        return view('auth.register')->withRoles($roles);
    }

    public function register(Request $request){

        $validation = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'permissions' =>  'string|min:6|confirmed',
                'otros_datos' => 'nullable',
            ]);

          if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput();
         }
         $otros_datos=array('linkedin'=>'','facebook'=>'','img'=>'/js/tinymce/js/tinymce/plugins/responsive_filemanager/source/user_default.png');
        $rol=$request['roles'];
        $role=$rol[0];
//        return response($role);
        $user = Sentinel::register($request->all());
        $user->roles()->sync([$role]);
//       $user->img="/js/tinymce/js/tinymce/plugins/responsive_filemanager/source/user_default.png";
        $user->permissions = [(Sentinel::findRoleById($role)->name)];
        $user->otros_datos=json_encode($otros_datos);
//        $user->nivel_acceso='1';

        if($role=="2"){
          $user->nivel_acceso='1';
        }
        if($role=='4'){
            $user->nivel_acceso='2';
        }
        //PROFESOR . A CURRICULUM

        elseif($role=='3'){
            $invitado=new Invitados();
            $invitado->invitado_id=$user->id;
            $invitado->alumno_id=null;
            $invitado->nivel_acceso=3;
            $invitado->rol="Profesor";
            $invitado->numero_accesos=null;
            $invitado->save();
            $user->nivel_acceso='3';
        }

        $user->save();
        $cursoAlumno=new CursoAlumno();
        $cursoAlumno->user_id=$user->id;
        $cursoAlumno->curso=1;

        $cursoAlumno->save();



//        $user ->otros_datos['img' => '\js\tinymce\plugins\responsive_filemanager\source\user_default.png']);
//        $user->otros_datos->img = 'some_other_value';

        //Activate the user **
         $activation = Activation::create($user);
         $activation = Activation::complete($user, $activation->code);
        //End activation
        $request['name'];
        $rol=$request['roles'];
        $rol=$rol[0];
        if($user){
            $user->roles()->sync([$rol]);

            Session::flash('message', 'Registration is completed');
            //Session::flash('status', 'success');
//            $role = Sentinel::findRoleBySlug($rol);
//            $role->users()->attach($user);


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



}
