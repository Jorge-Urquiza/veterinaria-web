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
    return view('welcome');
});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
//PERSONALIZACION COLORES
    Route::post('color', 'UserController@color')->name('color');
//CASO DE USO 1 GESTIONAR VETERINARIOS
    Route::get('veterinarios', 'VeterinarioController@index')->name('veterinarios');
});

