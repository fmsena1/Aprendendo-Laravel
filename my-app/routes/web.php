<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route:: get('/teste/{nome}', function($nome){
    echo "Olá, $nome !";

});
// Parametros opcionais
Route:: get('/seunome/{nome?}', function($nome = null){
    if(isset($nome))
         echo "Olá, $nome !";
    else echo "Você não digitou nenhum nome !!";

});
// Rota com regras
Route:: get('/rotacomregras/{nome}/{n}', function($nome, $n){
    for($i=0; $i<$n;$i++)
        echo "Olá $nome! <br>";

})->where('nome', '[A-Za-z]+') ->where('n', '[0-9]');

//Agrupamento de rotas

Route::prefix('/app') ->group(function(){

    Route::get('/', function () {
        return view('myapp');
    });

    Route::get('/user', function () {
        return view('user');
    });

    Route::get('/contact', function () {
        return view('contact');
    });


});