<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboral extends Model
{
    protected $table = 'alumno_laboral';


    protected $fillable = [
        'user_id',
        'cargo',
        'empresa',
        'ubicacion',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'actual'
    ];//

    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }

}
