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
//use App\Http\Middleware\Login;

Route::get('/', 'LoginController@index')->name('login_index');

Route::post('/entrar', 'LoginController@login')->name('login');

Route::get('/registrar', 'CadastroUsuarioController@index')->name('cadastro_index');

Route::post('/registrar/save', 'CadastroUsuarioController@store')->name('cadastro_store');


//Route::middleware(Login::class)->
//group(function(){

Route::get('/home', 'HomeController@home')->name('welcome');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro')->middleware('auth');

Route::get('/redirects',[HomeController::class,"index"]);

Route::post('/cadastro/save', 'PessoasController@store')->name('pessoas_store');

Route::get('/cadastro/editar/{id}', 'PessoasController@editarIndex')->name('pessoas_editar');

Route::post('/cadastro/editar', 'PessoasController@update')->name('pessoas_update');

Route::get('/lista', 'PessoasController@exibirTodos')->name('lista')->middleware('auth');

Route::get('/lista/pessoas/deletar/{id}', 'PessoasController@destroy')->name('pessoas_destroy');

Route::get('/pdf', 'PdfController@gerar')->name('gerar_pdf')->middleware('auth');

Route::get('/pdf/protocolos', 'PdfController@gerarProtocolo')->name('gerar_pdf_protocolos')->middleware('auth');

Route::get('/cadastro_prot', 'ProtocolosController@index')->name('cadastro_prot')->middleware('auth');

Route::get('/cadastro_prot/editar/{id}', 'ProtocolosController@editarIndex')->name('protocolos_editar')->middleware('auth');

Route::post('/cadastro_prot/editar', 'ProtocolosController@update')->name('protocolos_update');

Route::get('/lista/protocolos', 'ProtocolosController@exibirTodos')->name('lista_protocolos')->middleware('auth');

Route::get('/acompanhamento_cadastro', 'AcompanhamentosController@acompIndex')->name('acomp_cadastro')->middleware('auth');

Route::post('/acompanhamento_cadastro/save', 'AcompanhamentosController@acompStore')->name('acomp_store');

Route::get('/lista/protocolos/deletar/{id}', 'ProtocolosController@destroy')->name('protocolos_destroy');

Route::post('/cadastro_prot/save', 'ProtocolosController@store')->name('protocolos_store');


//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
