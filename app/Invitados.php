<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitados extends Model
{
    public $table = "Invitados";

    protected $fillable = ['id' , 'user_id','user_id'

    ];
    public function categorias(){
        return $this->belongsToMany(User::class);
    }



}