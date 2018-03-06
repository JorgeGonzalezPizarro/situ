<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorias;
class hechos extends Model
{
    protected $categoria;
    protected static $categoriaModel = 'App\Categorias';


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
    public   function getCategoria() {

        return $this->belongsTo('App\Categorias','categoria_id','id');



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
