<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocolos extends Model
{
    protected $fillable=['descricao','data', 'prazo', 'atendente', 'receptor'];

    public function getAtendente(){
        return $this->belongsTo(Pessoas::class, 'atendente', 'id');
    }

    public function getReceptor(){
        return $this->belongsTo(Pessoas::class, 'receptor', 'id');
    }

}