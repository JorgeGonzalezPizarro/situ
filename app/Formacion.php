<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    protected $table = 'alumno_formacion';


    protected $fillable = [
        'user_id',
        'centro',
        'ubicacion',
        'titulacion',
        'disciplina_academica',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'actual',

    ];//
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}
