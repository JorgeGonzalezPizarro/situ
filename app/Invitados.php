<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitados extends Model
{
    public $table = "Invitados";

    protected $fillable = ['id' , 'invitado_id','user_id','numero_accesos','fecha_limite'

    ];
    public function getUsuario(){
        return $this->hasOne('App\User','id','invitado_id');
    }
    public function getAlumno(){
        return $this->hasOne('App\User','id','alumno_id');
    }


    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}