<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiquetas extends Model
{

    protected $fillable = [
        'nombre' , 'slug','color'

    ];


    public function getHecho(){

        return $this->belongsToMany('App\hechos','hecho_etiqueta');

    }
}


