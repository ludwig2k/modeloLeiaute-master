<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Protocolos extends Model implements Auditable

{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable=['descricao','data', 'prazo', 'atendente', 'receptor'];

    public function getAtendente(){
        return $this->belongsTo(Pessoas::class, 'atendente', 'id');
    }

    public function getReceptor(){
        return $this->belongsTo(Pessoas::class, 'receptor', 'id');
    }

}