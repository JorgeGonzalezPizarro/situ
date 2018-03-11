<?php
namespace App\Http\Controllers;

use App\Calificaciones;
use App\Etiqueta;
use App\hecho_etiqueta;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use App\hechos;
use Validator;
use Sentinel;
use Carbon;
use Session;
use Datetime;
use App\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
class HechoController extends Controller
{


        public function guardar_Hecho(Request $request){

            $rules = array( );

            $validator = Validator::make(Input::all(),$rules);


            if($validator->fails()){
                return Redirect::back()->withErrors($validator)->withInput();
            }
            else {
                $hecho = new hechos();
                $hecho->user_id = Sentinel::getUser()->id;
                if(empty(Input::get('titulo_hecho'))){
                    $categoria=Categorias::where('id',Input::get('categoria_id'))->get()->first();
                    $hecho->titulo_hecho=$categoria->categoria;

                }else{
                    $hecho->titulo_hecho = Input::get('titulo_hecho');

                }
                $hecho->categoria_id = Input::get('categoria_id');
                $hecho->curso = Input::get('curso');
                $hecho->contenido = Input::get('contenido');
                $hecho->proposito = Input::get('proposito');
                $hecho->evidencia = Input::get('evidencia');
//                $hecho -> etiqueta= Input::get('etiqueta');
                $hecho->hechos_relacionados = Input::get('hechos_relacionados');
                $format = 'd/m/Y';
                $fecha_inicio = Carbon\Carbon::createFromFormat($format, Input::get('startDate'));
                $hecho->fecha_inicio = $fecha_inicio;
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

                if (Input::hasfile('imagen')) {
                    $extension = Input::file('imagen')->getClientOriginalExtension(); // Get image extension
                    $now = new \DateTime(); // Get date and time
                    $date = $now->getTimestamp(); // Convert date and time in timestamp
                    $fileName = $date . '.' . $extension; // Give name to image
                    $destinationPath = 'imagenes'; // Define destination path
                    $img = Input::file('imagen')->move($destinationPath, $fileName); // Upload image to destination path
                    $new_path = $destinationPath . '/' . $fileName; // Write image path in DB
                    $hecho->ruta_imagen = $new_path;

                    // Resize image
                    $filename = $new_path; // Get image

                    // Resize image to format 900px/300px
                    $size = getimagesize($filename); // Get image size

                    $ratio = $size[0]/$size[1]; // Get ratio width/height

                    if ($ratio > 3) { // If ratio is greater than optimal (900px/300px)
                        $new_width = $size[0]/($size[1]/300);
                        $new_height = 300;
                        $shift_x = (($new_width - 900)*($size[0]/$new_width))/2;
                        $shift_y = 0;
                    } elseif ($ratio < 3) { // If ratio is less than optimal (900px/300px)
                        $new_width = 900;
                        $new_height = $size[1]/($size[0]/900);
                        $shift_x = 0;
                        $shift_y = (($new_height - 300)*($size[1]/$new_height))/2; //should be equal to 330 or 220
                    } else { // If ratio is already optimal (900px/300px = 3)
                        $new_width = 900;
                        $new_height = 300;
                        $shift_x = 0; // No need to crop horizontally
                        $shift_y = 0; // No need to crop vertically
                    }

                    $src = imagecreatefromstring(file_get_contents($filename));

                    $dst = imagecreatetruecolor(900,300);
                    imagecopyresampled($dst, $src, 0, 0, $shift_x, $shift_y, $new_width, $new_height, $size[0], $size[1]);
                    imagedestroy($src); // Free up memory
                    imagejpeg($dst, $filename, 100); // adjust format as needed
                    imagedestroy($dst);

                }

                /*CALIFICACIONES*/


                $hecho->save();

                if(($request->categoria_id)==2) {
                    $calificacion=new Calificaciones();
                    $calificacion->id_hechos=$hecho->id;
                    $calificacion->calificacion=$request->calificacion;
                    $calificacion->asignatura=$request->asignatura;
                    $calificacion->profesor=$request->profesor;
                    $calificacion->save();

                }




                $etiqueta=Input::get('etiqueta');
                $hecho1= hechos::find($hecho->id);
                if(!empty($etiqueta)) {
                    foreach ($etiqueta as $etiquet) {
                    $etiqueta1=new hecho_etiqueta();
                        $etiqueta1->hechos_id=$hecho->id;
                        $etiqueta1->etiqueta_id=$etiquet;
                        $etiqueta1->save();

                    }
                }
                $user=Sentinel::getUser();

                $hechos=$user->getHechos()->get();
                Session::flash('message', 'Hecho creado');
                return redirect()->back();

            }


        }
    public function fraseguia(Request $request){




            $hecho = new hechos();
            $hecho->user_id = Sentinel::getUser()->id;
            $hecho->titulo_hecho ='Frase guia';
            $hecho->categoria_id = Input::get('categoria_id');
            $hecho->contenido = Input::get('contenido');
            $hecho->nivel_acceso = Input::get('nivel_acceso');
            $hecho->hechos_relacionados = Input::get('hechos_relacionados');
            $format = 'd/m/Y';
        $dt = new DateTime();
        $fecha_inicio =$dt->format('Y-m-d H:i:s');
        $hecho->fecha_inicio = $fecha_inicio;
            /*CALIFICACIONES*/


            $hecho->save();





            Session::flash('message', 'Hecho creado');

        return Redirect::back();

        }




    public function crear(Request $request){

            if(Sentinel::check()){
                $categorias=Categorias::get();
                $etiqueta=Etiqueta::pluck('slug');
                return view('Alumno.crear')->with('etiqueta',$etiqueta)->with('categorias',$categorias);
//                return view('Alumno.crear',compact('etiqueta'));

            }
    }



    }
