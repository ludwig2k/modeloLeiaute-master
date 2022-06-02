<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
            //$this->validate(request(),[
            //'name' => 'required',
            //'email'=>'required',
            //'password'=>'required'
            //]);


        $user=User::where('name', $name)->where('email', $email)->where('password', $password)->first();

        if($user){
            session_start();
            $_SESSION['usuario'] = $email;
            //return view('welcome');

            //auth()->login($user);

            //return view('welcome');


        }
    }   

    public function logout(){
        session_destroy();
        return redirect()->route('login_index');
    }

    //public function update(Request $request) {
        //$request->user()->fill([
           //'password' => Hash::make($request->newPassword) 
        //])->save();
     //}
}
