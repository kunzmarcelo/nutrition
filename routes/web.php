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
// Route::get('/admin', function() {
//     return view('/admin/login');
// });


Auth::routes();


Route::group(['prefix'=>'painel','middleware' => 'auth'], function() {
  Route::get('/home', 'HomeController@index')->name('home');


  Route::resource('lote', 'Painel\LotController');
  Route::resource('animais', 'Painel\AnimalController');
  Route::resource('producao', 'Painel\ProductionController');
  Route::resource('aplicacoes', 'Painel\AnimalMedicineController');
  Route::resource('entrega', 'Painel\DeliveryController');
  Route::resource('reproducao', 'Painel\ReproductionController');
  Route::resource('desafio', 'Painel\ChallengeController');
  Route::resource('estoque', 'Painel\StockController');
  Route::resource('reproducao/inseminacao', 'Painel\InseminationController');
  Route::resource('reproducao/semem', 'Painel\SemenController');

  Route::resource('medicamento', 'Painel\MedicineController');

  Route::get('fechamento_dia', 'Painel\ReproductionController@closeDay');
  Route::get('fechamento_dia/{date?}', 'Painel\ReproductionController@show');
  Route::get('fechamento_dia/pdf/{date}', 'Painel\ReproductionController@downloadPDF');
  Route::get('fechamento_animais', 'Painel\AnimalController@downloadPDF');



  Route::resource('permissions', 'Painel\PermissionController');
  Route::get('permission/{id}/roles', 'Painel\PermissionController@roles');

  Route::resource('roles', 'Painel\RoleController');
  Route::get('role/{id}/permissions', 'Painel\RoleController@permissions');

  Route::resource('users', 'Painel\UserController');
  Route::get('user/{id}/roles', 'Painel\UserController@roles');


Route::get('changeStatus', 'Painel\UserController@changeStatus');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
