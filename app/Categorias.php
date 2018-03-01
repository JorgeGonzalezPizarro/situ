<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public $table = "categorias";

    protected $fillable = ['categoria' , 'user_id',

    ];


//    public function getCategoria(){
//
//        return $this->belongsToMany('App\hechos','hecho_etiqueta');
//
//    }

    public function categorias(){
        return $this->belongsToMany('App\hechos');
    }
    public static function getHechos(){

        return  categorias();

    }

}
