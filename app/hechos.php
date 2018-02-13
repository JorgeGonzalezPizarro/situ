<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorias;
class hechos extends Model
{
    protected $categoria;


    protected $fillable = [ 'user_id' ,
        'categoria_id','titulo_hecho', 'curso', 'contenido', 'proposito', 'evidencia',
        'nivel_autorizacion', 'hechos_relacionados', 'fecha_inicio','fecha_fin','proposito', 'evidencia',
        'ruta_imagen',
    ];
    public $timestamps = true;


    public function getEtiqueta()
    {

        return $this->belongsToMany('App\Etiqueta', 'hecho_etiqueta');

    }


        public function user() {

            return $this->belongsto('App\User');


        }
    public  static function getCategoria($id) {

        return  Categorias::find($id);;


    }




}
