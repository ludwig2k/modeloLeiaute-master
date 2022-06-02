<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf1' => ['required', 'string','cpf', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'name.required' => 'O campo de nome é obrigatorio!',
            'email.required' => 'Por favor digite o seu email!',
            'password.required' => 'Por favor digite a sua senha!',
            'password.min' => 'Sua senha precisa ter no minimo 6 digitos!',
            'password.confirmed' => 'As suas senhas não coincidem!',
            'cpf1.required' => 'O campo de CPF é obrigatorio!',
            'cpf1.unique' => 'Este CPF ja foi cadastrado!',
            'cpf1.cpf' => 'O CPF inserido é invalido!'
        ],
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'cpf1' => $data['cpf1'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
