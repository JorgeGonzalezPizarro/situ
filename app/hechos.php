<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hechos extends Model
{

    protected $fillable = [ 'usuario' ,
        'tipo_hecho','titulo_hecho', 'curso', 'contenido', 'proposito', 'evidencia',
        'nivel_autorizacion', 'hechos_relacionados', 'fecha_hecho', 'proposito', 'evidencia',
        'ruta_imagen',
    ];
    public $timestamps = true;



}
