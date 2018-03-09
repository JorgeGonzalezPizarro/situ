<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    public $table = "etiqueta";

    protected $fillable = [
       'user_id','nombre' , 'slug','color'

    ];



}


