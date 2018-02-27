<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    public $table = "calificaciones";

    protected $fillable = [
        'calificacion' , 'profesor','asignatura'

    ];


    public function getHecho(){

        return $this->hasOne('App\hechos','id','id_hecho');



    }}
