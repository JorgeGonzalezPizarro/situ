<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hechos extends Model
{

    protected $fillable = [ 'user_id' ,
        'tipo_hecho','titulo_hecho', 'curso', 'contenido', 'proposito', 'evidencia',
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



}
