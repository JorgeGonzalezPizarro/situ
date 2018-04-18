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
use Carbon;
use Activation;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Cartalyst\Sentinel\Users;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Contracts\Encryption\DecryptException;
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
        $roles=Role::where('slug','!=','Inv')->pluck('slug','id')->get()->all();

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
        $niceNames = array(
            'first_name' => 'Nombre',
            'password' => 'Contraseña',
            'last_name' => 'Apellido',
            'email' => 'Email',

        );
        $validation->setAttributeNames($niceNames);

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
            $cursoAlumno=new CursoAlumno();
            $cursoAlumno->user_id=$user->id;
            $cursoAlumno->curso=1;
            $cursoAlumno->grado=null;
            $cursoAlumno->asignaturas="";

            $cursoAlumno->save();
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
            $format = 'd/m/Y';

//            $format = 'dd/mm/YY HH:mm:ss';
                $invitado->fecha_limite = Carbon\Carbon::createFromFormat($format, Input::get('fecha_limite'));
//
//            $invitado->fecha_limite=Carbon::parse(Input::get('fecha_limite'));
//           =Input::get('fecha_limite');

            $invitado->save();
            $user->nivel_acceso='3';

        }

        $user->save();




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
            Session::flash('message', 'Registro completado');

            $encrypted = encrypt($request['password']);

            if($user->roles()->get()->first()->name != "Alumno"){



//            $data=[
//                'request'=>$request->all(),
//                'encrypted'=>$encrypted
//            ];




                $data = array('profesor'=>$user->first_name,'first_name' => $request['first_name'], 'email' => $request['email'], 'encrypted' => $encrypted,
                );
            }else{
                $data = array('password'=>Input::get('password'),'first_name' => $request['first_name'], 'email' => $request['email'], 'encrypted' => $encrypted,
                );
            }
            Mail::send('email', $data,function ($mensaje) use($data){

                $mensaje->from('jorge.j.gonzalez.93@gmail.com  ',"Site name");
                $mensaje->subject("Bienvenido a SITU");
                $mensaje->to($data['email'],$data['first_name']);


            });
//           return redirect('/');
//           return redirect('/');
            return redirect()->back();
        }
        // Session::flash('message', 'There was an error with the registration' );
         //Session::flash('status', 'error');
         return Redirect::back();
    }



}
