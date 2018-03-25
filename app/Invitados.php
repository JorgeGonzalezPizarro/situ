<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitados extends Model
{
    public $table = "Invitados";

    protected $fillable = ['id' , 'invitado_id','user_id','numero_accesos'

    ];
    public function getUsuario(){
        return $this->hasOne('App\User','id','invitado_id');
    }
    public function getAlumno(){
        return $this->hasOne('App\User','id','alumno_id');
    }


}