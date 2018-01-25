<?php

namespace Situ;

use Illuminate\Database\Eloquent\Model;

class hechos extends Model
{

    protected $fillable = [ 'usuario' ,
            'tipo_hecho', 'curso', 'contenido', 'proposito', 'evidencia',
            'nivel_autorizacion', 'hechos_relacionados', 'fecha_hecho', 'proposito', 'evidencia',

    ];
    public $timestamps = true;


}
