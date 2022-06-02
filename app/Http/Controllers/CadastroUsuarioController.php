<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\User;

class CadastroUsuarioController extends Controller
{

    public function index(){
        return view('auth.register');
}
    public function store(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6','confirmed'],
            
        ],
        [
        'name.required' => 'Por favor digite o seu nome!',
        'email.required' => 'Por favor digite o seu email!',
        'password.required' => 'Por favor digite a sua senha!',
        'password.min' => 'Sua senha precisa ter no minimo 6 digitos!',
        'password.confirmed' => 'As suas senhas não coincidem!'
   
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $usuarioCriado = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}