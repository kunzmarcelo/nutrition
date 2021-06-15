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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();


Route::group(['prefix'=>'painel','middleware' => 'auth'], function() {
  Route::get('/home', 'HomeController@index')->name('home');


  Route::resource('lote', 'Painel\LotController');
  Route::resource('animais', 'Painel\AnimalController');
  Route::resource('producao', 'Painel\ProductionController');
  Route::resource('aplicacoes', 'Painel\AnimalMedicineController');
  Route::resource('entrega', 'Painel\DeliveryController');
  Route::resource('reproducao', 'Painel\ReproductionController');


});
