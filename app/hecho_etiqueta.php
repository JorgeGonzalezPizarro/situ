<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hecho_etiqueta extends Model
{
    public $table = "hecho_etiqueta";
    public $timestamps = false;

    protected $fillable = [ 'hechos_id' ,
        'etiqueta_id',
    ];


}
