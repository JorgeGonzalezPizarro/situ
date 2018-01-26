<?php

namespace Situ;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
class Hecho extends Model
{

    protected $fillable = [ 'usuario' ,
            'tipo_hecho','titulo_hecho', 'curso', 'contenido', 'proposito', 'evidencia',
            'nivel_autorizacion', 'hechos_relacionados', 'fecha_hecho', 'proposito', 'evidencia',

    ];
    public $timestamps = true;


}
