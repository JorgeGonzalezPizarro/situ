<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    public $table = "calificaciones";

    protected $fillable = [
        'calificacion' , 'profesor','asignatura','curso'

    ];
    public $timestamps = false;

    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
    public function getHecho(){

        return $this->hasOne('App\hechos','id','hechos_id');



    }}
