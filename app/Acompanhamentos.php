<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acompanhamentos extends Model
{
    protected $fillable=['observacao', 'data1','usuario', 'protocolo_id1'];

    public function getUsuario(){
        return $this->belongsTo(Pessoas::class, 'usuario', 'id');
    }

    public function getProtocolo(){
        return $this->belongsTo(Protocolos::class, 'protocolo_id1', 'id');
    }
}
