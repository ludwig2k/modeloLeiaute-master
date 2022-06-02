<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexos extends Model
{
    protected $fillable=['arquivo'];

    public function protocolo(){
        return $this->belongsTo(Protocolos::class);
    }
}
