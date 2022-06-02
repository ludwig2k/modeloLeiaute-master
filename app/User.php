<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    protected $fillable=['name','cpf1', 'email', 'password'];

    public function posts(){
        return $this->hasMany(Post::class);
}

}
