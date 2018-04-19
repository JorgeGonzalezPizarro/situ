<?php

namespace App\Http\Controllers\Auth;

use App\Invitados;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Sentinel;
use Illuminate\Http\Request;
use Activation;
use Redirect;
use Session;
use Illuminate\Support\Facades\Input;
use Mail;
use Carbon\Carbon;
use Mailchimp;
use App\ZipCode;
use App\logAccesos;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   use  ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/alumnoDashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        Sentinel::logout();

        return view('auth.login');
    }
    public function showLoginFormInv($email=null,$encrypted=null)
    {
        Sentinel::logout();


            try {
                $decrypted = decrypt($encrypted);
<<<<<<< HEAD
                return view('auth.loginInv')->with('email', $email)
                    ->with('decrypted', $decrypted);
=======
>>>>>>> bc225302d39b8cd161c1cdf1c59002d4e7f87575
            } catch (DecryptException $e) {
                $decrypted = "";
                return view('auth.loginInv')
                    ->with('email', $email)->with('decrypted', $decrypted);

            }




    }
    protected function login(Request $request)
    {


        try {

            // Validation
            $validation = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required ',
            ]);

            if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput();
            }
            $remember = (Input::get('remember') == 'on') ? true : false;
            $usuarios=User::where('email',$request['email'])->get()->all();
            if (count($usuarios)>1) {
              if($user=Sentinel::authenticate($request->all(), $remember)) {

                  if (Sentinel::check() && Sentinel::inRole('Prof')) {

                      $usuario = Sentinel::getUser();
                      $usuario = Invitados::where('invitado_id', $usuario->id)->get()->first();
                      if (($usuario->fecha_limite) < (Carbon::now()->toDateString())) {
                          Sentinel::logout();
                          return view('auth.loginInv')->withErrors(['global' => 'Error al logear , contactar con administracion : Admin@admin.com'])->with('email', $usuario->getUsuario()->get()->first()->email)->with('decrypted', "");
                      } else {

                          $invitado = Invitados::where('invitado_id', Sentinel::getUser()->id)->get()->first();
                          $invitado->numero_accesos = ($invitado->numero_accesos) + 1;
                          $invitado->update();

                          return redirect('Situ/public')->withUser($user);
                      }

                  }
                  if (Sentinel::check() && Sentinel::inRole('Inv')) {
                      $usuario = Sentinel::getUser();
                      $usuario = Invitados::where('invitado_id', $usuario->id)->get()->first();

                      if (($usuario->fecha_limite) < (Carbon::now()->toDateString())) {

                          return view('auth.loginInv')->withErrors(['global' => 'Error al logear , contactar con administracion 111: Admin@admin.com '])->with('email', $usuario->getUsuario()->get()->first()->email)->with('decrypted', "");
                      } else {
                          $invitado = Invitados::where('invitado_id', Sentinel::getUser()->id)->get()->first();
                          $invitado->numero_accesos = ($invitado->numero_accesos) + 1;
                          $alumno = $invitado->getAlumno()->get()->first();
                          $invitado->update();
                          $logAccesos = new logAccesos();
                          $logAccesos->invitado_id = $invitado->id;
                          $logAccesos->alumno_id = $alumno->id;
                          $logAccesos->rol = $invitado->rol;
                          $logAccesos->hechos_id = null;
                          $logAccesos->numero_accesos = 0;
                          $logAccesos->save();

                          return redirect('Situ/public')->withUser($user);

//                            return redirect('Situ/public')->withUser($user);
                      }

                  }
              }else{
                  return "asf";
              }


            }
            else {

                if ($user = Sentinel::authenticate($request->all(), $remember)) {

                    if (Sentinel::check() && Sentinel::inRole('Admin')) {
                        return redirect('Admin/adminDashboard')->withUser($user);;
                    }
                    if ((Sentinel::check() && Sentinel::inRole('Alu'))) {
                        return redirect('Alumno/alumnoDashboard')->withUser($user);

                    }
                    if (Sentinel::check() && Sentinel::inRole('Prof')) {
                        $usuario = Sentinel::getUser();
                        $usuario = Invitados::where('invitado_id', $usuario->id)->get()->first();
                        if (($usuario->fecha_limite) < (Carbon::now()->toDateString())) {
                            Sentinel::logout();
                            return view('auth.loginInv')->withErrors(['global' => 'Error al logear , contactar con administracion : Admin@admin.com'])->with('email', $usuario->getUsuario()->get()->first()->email)->with('decrypted', "");
                        } else {

                            $invitado = Invitados::where('invitado_id', Sentinel::getUser()->id)->get()->first();
                            $invitado->numero_accesos = ($invitado->numero_accesos) + 1;
                            $invitado->update();
                            return redirect('Situ/public')->withUser($user);
                        }
                    }
                    if (Sentinel::check() && Sentinel::inRole('Inv')) {
                        $usuario = Sentinel::getUser();
                        $usuario = Invitados::where('invitado_id', $usuario->id)->get()->first();

                        if (($usuario->fecha_limite) < (Carbon::now()->toDateString())) {

                            return view('auth.loginInv')->withErrors(['global' => 'Error al logear invitado, contactar con administracion : Admin@admin.com '])->with('email', $usuario->getUsuario()->get()->first()->email)->with('decrypted', "");
                        } else {
                            $invitado = Invitados::where('invitado_id', Sentinel::getUser()->id)->get()->first();
                            $invitado->numero_accesos = ($invitado->numero_accesos) + 1;
                            $alumno = $invitado->getAlumno()->get()->first();

                            $invitado->update();
                            $logAccesos = new logAccesos();
                            $logAccesos->invitado_id = $invitado->id;
                            $logAccesos->alumno_id = $alumno->id;
                            $logAccesos->rol = $invitado->rol;
                            $logAccesos->hechos_id = null;
                            $logAccesos->numero_accesos = 0;
                            $logAccesos->save();
                            return redirect('Situ/public')->withUser($user);
                        }

                    }
                }else {
                    return Redirect::back()->withErrors(['global' => 'Los datos de acceso no son correctos.']);
                }
            }
        }catch (NotActivatedException $e) {
            return Redirect::back()->withErrors(['global' => 'El usuario no esta activado','activate_contact'=>1]);

        }
        catch (ThrottlingException $e) {

            $delay = $e->getDelay();
            return Redirect::back()->withErrors(['global' => 'Tu cuenta está desactivada ' .' '. $delay .' segundos ','activate_contact'=>1]);
        }

        return Redirect::back()->withErrors(['global' => 'Error al loguear , por favor contacte con el administrador']);

        
    }
    

    protected function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
    protected function activate($id){
        $user = Sentinel::findById($id);

        $activation = Activation::create($user);
        $activation = Activation::complete($user, $activation->code);
        Session::flash('message', trans('messages.activation'));
        Session::flash('status', 'success');
        return redirect('login');
    }

}
