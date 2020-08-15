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
//PERSONALIZACION 
       // Route::post('color', 'UserController@color')->name('color');
        //CASO DE USO 1 GESTIONAR CLIENTE
        /*
        Route::get('clientes', 'ClienteController@index')->name('clientes.index');
        Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
        Route::post('clientes/store', 'ClienteController@store')->name('clientes.store');
        Route::get('clientes/{veterinario}/edit','ClienteController@edit')->name('clientes.edit');
        Route::put('clientes/{veterinario}/update', 'ClienteController@update')->name('clientes.update');
        Route::delete('clientes/{veterinario}/delete', 'ClienteController@destroy')->name('clientes.delete');

        //CASO DE USO 1 GESTIONAR MASCOTA
        Route::get('mascotas', 'MascotaController@index')->name('mascotas.index');
        Route::get('mascotas/create', 'MascotaController@create')->name('mascotas.create');
        Route::post('mascotas/store', 'MascotaController@store')->name('mascotas.store');
        Route::get('mascotas/{veterinario}/edit','MascotaController@edit')->name('mascotas.edit');
        Route::put('mascotas/{veterinario}/update', 'MascotaController@update')->name('mascotas.update');
        Route::delete('mascotas/{veterinario}/delete', 'MascotaController@destroy')->name('mascotas.delete');


         //CASO DE USO 1 GESTIONAR MASCOTA
        Route::get('categorias', 'CategoriaController@index')->name('categorias.index');
        Route::get('categorias/create', 'CategoriaController@create')->name('categorias.create');
        Route::post('categorias/store', 'CategoriaController@store')->name('categorias.store');
        Route::get('categorias/{veterinario}/edit','CategoriaController@edit')->name('categorias.edit');
        Route::put('categorias/{veterinario}/update', 'CategoriaController@update')->name('categorias.update');
        Route::delete('categorias/{veterinario}/delete', 'CategoriaController@destroy')->name('categorias.delete');

   //Veterinarios
    */
        Route::get('veterinarios', 'VeterinarioController@index')->name('veterinarios.index');
        Route::get('veterinarios/create', 'VeterinarioController@create')->name('veterinarios.create');
        Route::post('veterinarios/store', 'VeterinarioController@store')->name('veterinarios.store');
        Route::get('veterinarios/{veterinario}/edit','VeterinarioController@edit')->name('veterinarios.edit');
        Route::put('veterinarios/{veterinario}/update', 'VeterinarioController@update')->name('veterinarios.update');
        Route::delete('veterinarios/{veterinario}/delete', 'VeterinarioController@destroy')->name('veterinarios.delete');
        
        Route::post('color', 'VeterinarioController@color')->name('color');
       
});

