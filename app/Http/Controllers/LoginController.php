<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $existe = User::where('email', $email)->where('password', $password)->first();

        if($existe){
            session_start();
            $_SESSION['usuario'] = $email;
            return redirect()->route('welcome');
        }
        else{
            return redirect()->back();

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
