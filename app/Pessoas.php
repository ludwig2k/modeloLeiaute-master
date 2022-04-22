<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    protected $fillable=['nome', 'sexo', 'cidade', 'bairro', 'rua', 'cpf', 'data_nascimento', 'complemento'];
}
