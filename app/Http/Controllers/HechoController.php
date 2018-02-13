<?php
namespace App\Http\Controllers;

use App\Etiqueta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;
use App\hechos;
use Validator;
use Sentinel;
use Session;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
class HechoController extends Controller
{


        public function guardar_Hecho(Request $request){

            $rules = array( 'titulo_hecho' => 'required');

            $validator = Validator::make(Input::all(),$rules);


            if($validator->fails()){
                return Redirect::to('hechos/crear')->withErrors($validator)->withInput();
            }
            else{
                $hecho = new hechos();
                $hecho -> user_id = Sentinel::getUser()->id;
                $hecho -> titulo_hecho = Input::get('titulo_hecho');
                $hecho -> tipo_hecho = Input::get('tipo_hecho');
                $hecho -> curso= Input::get('curso');
                $hecho -> contenido= Input::get('contenido');
                $hecho -> proposito= Input::get('proposito');
                $hecho -> evidencia= Input::get('evidencia');
//                $hecho -> etiqueta= Input::get('etiqueta');
                $hecho -> nivel_autorizacion= Input::get('nivel_autorizacion');
                $hecho -> hechos_relacionados= Input::get('hechos_relacionados');
                $format = 'd/m/Y';



                $fecha_inicio = Carbon\Carbon::createFromFormat($format, Input::get('startDate'));

               $hecho -> fecha_inicio= $fecha_inicio;
                $fecha_fin = Carbon\Carbon::createFromFormat($format, Input::get('endDate'));

                $hecho -> fecha_fin= $fecha_fin;

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
                $hecho->save();

                $etiqueta=Input::get('etiqueta');
                $hecho1= hechos::find($hecho->id);
                foreach ($etiqueta as $etiquet){

                    $hecho->getEtiqueta()->attach($etiquet);



                }
                Session::flash('message', 'Hecho creado');

                return redirect()->back();

            }


        }


    public function crear(Request $request){

            if(Sentinel::check()){
                $etiqueta=Etiqueta::pluck('slug');
                return view('Alumno.crear',compact('etiqueta'));
            }
    }



    }
