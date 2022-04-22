<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Database\Eloquent\Collection;
use App\Http\Middleware\Login;

Route::get('/', 'LoginController@index')->name('login_index');

Route::post('/login', 'LoginController@login')->name('login_login');

Route::get('/register', 'CadastroUsuarioController@index')->name('cadastro_index');

Route::post('/cadastro/save', 'CadastroUsuarioController@store')->name('cadastro_store');

Route::middleware(Login::class)->prefix('/login')->
group(function(){

Route::get('/welcome', 'HomeController@welcome')->name('welcome');

Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro');

Route::post('/cadastro/save', 'PessoasController@store')->name('pessoas_store');

Route::get('/lista', 'PessoasController@exibirTodos')->name('lista');


Route::get('/pdf',function() {
    $collection = collect([
        ['id' => 1, 'name' => 'John','surname' => 'Constantine', 'age' => 45],
        ['id' => 2, 'name' => 'Jane', 'surname' => 'Tarzan', 'age' => 33],
        ['id' => 3, 'name' => 'James', 'surname' => 'Hetfield', 'age' => 56],
        ['id' => 4, 'name' => 'Pablo', 'surname' => 'Picasso', 'age' => 91],
        ['id' => 5, 'name' => 'Elton', 'surname' => 'John', 'age' => 72],
    ]);
    $cadastros = json_decode(json_encode($collection));
    $pdf = \PDF::loadView('pdf', compact('cadastros'));
    return $pdf->stream('exemplo.pdf');
})->name('pdf');

Route::get('/cadastro_prot', 'ProtocolosController@index')->name('cadastro_prot');

Route::post('/cadastro_prot/save', 'ProtocolosController@store')->name('protocolos_store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
});