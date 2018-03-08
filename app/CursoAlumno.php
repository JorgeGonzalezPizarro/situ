<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class CursoAlumno extends Model
{

    /**
     * {@inheritDoc}
     */
    protected $table = 'alumno_curso';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'user_id',
        'curso',
        'grado',
        'asignaturas'=>'object',

    ];//




}
