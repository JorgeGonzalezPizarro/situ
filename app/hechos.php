<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorias;
class hechos extends Model
{
    protected $categoria;
    protected static $categoriaModel = 'App\Categorias';
    protected static $etiquetasModel = 'App\hecho_etiqueta';

    protected $fillable = [ 'user_id' ,
        'categoria_id','titulo_hecho', 'curso', 'contenido', 'proposito', 'evidencia',
        'nivel_acceso', 'hechos_relacionados', 'fecha_inicio','fecha_fin','proposito', 'evidencia',
        'ruta_imagen','ruta_archivo','laboral_id'
    ];
    public $timestamps = true;


//    public function getEtiqueta()
//    {
//        return $this->belongsTo(static::$etiquetasModel,'hecho_etiqueta');
//
////        return $this->hasOne('App\Etiqueta', 'hechos_id','id');
//
//    }
    public   function getEtiqueta() {

        return $this->belongsTo('App\hecho_etiqueta','id','hechos_id');



    }

        public function user() {

            return $this->belongsto('App\User');


        }
    public   function getCategoria() {

        return $this->belongsTo('App\Categorias','categoria_id','id');



    }
    public   function getLaboral() {

        return $this->belongsTo('App\Laboral','laboral_id','id');



    }

    public function calificaciones()
    {
        return $this->hasOne('App\Calificaciones');
    }
    public function withTimestamps($createdAt = null, $updatedAt = null)
    {
        $this->withTimestamps = true;

        $this->pivotCreatedAt = $createdAt;
        $this->pivotUpdatedAt = $updatedAt;

        return $this->withPivot($this->createdAt(), $this->updatedAt());
    }





}
