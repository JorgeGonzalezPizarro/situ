<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Invitados;
class logAccesos extends Model
{
    protected $table = 'logAccesos';
    public $timestamps = false;


    protected $fillable = [
        'invitado_id',
        'alumno_id',
        'rol',
        'hechos_id',
        'numero_accesos',

    ];//
    public function getInvitados()
    {
        return $this->belongsTo(Invitados::class, 'invitado_id', 'id');
    }
    public function getHechos()
    {
        return $this->belongsTo(hechos::class, 'hechos_id', 'id');
    }
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}
