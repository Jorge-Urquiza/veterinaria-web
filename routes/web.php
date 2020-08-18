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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
//PERSONALIZACION 
       // Route::post('color', 'UserController@color')->name('color');
        //CASO DE USO 1 GESTIONAR CLIENTE
      
     Route::get('clientes', 'ClienteController@index')->name('clientes.index');
     Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
     Route::get('clientes/{cliente}/edit','ClienteController@edit')->name('clientes.edit');
     Route::post('clientes/store', 'ClienteController@store')->name('clientes.store');
     Route::put('clientes/{cliente}/update', 'ClienteController@update')->name('clientes.update');
     Route::delete('clientes/{cliente}/delete', 'ClienteController@destroy')->name('clientes.delete');

      /*  //CASO DE USO 1 GESTIONAR MASCOTA
        Route::get('mascotas', 'MascotaController@index')->name('mascotas.index');
        Route::get('mascotas/create', 'MascotaController@create')->name('mascotas.create');
        Route::post('mascotas/store', 'MascotaController@store')->name('mascotas.store');
        Route::get('mascotas/{veterinario}/edit','MascotaController@edit')->name('mascotas.edit');
        Route::put('mascotas/{veterinario}/update', 'MascotaController@update')->name('mascotas.update');
        Route::delete('mascotas/{veterinario}/delete', 'MascotaController@destroy')->name('mascotas.delete');
   */
     //CASO DE USO 3 GESTIONAR VETERINARIOS
     Route::get('veterinarios', 'VeterinarioController@index')->name('veterinarios.index');
     Route::get('veterinarios/create', 'VeterinarioController@create')->name('veterinarios.create');
     Route::post('veterinarios/store', 'VeterinarioController@store')->name('veterinarios.store');
     Route::get('veterinarios/{veterinario}/edit','VeterinarioController@edit')->name('veterinarios.edit');
     Route::put('veterinarios/{veterinario}/update', 'VeterinarioController@update')->name('veterinarios.update');
     Route::delete('veterinarios/{veterinario}/delete', 'VeterinarioController@destroy')->name('veterinarios.delete');
     //Custom
     Route::post('color', 'VeterinarioController@color')->name('color');
     Route::get('veterinarios/search', 'VeterinarioController@index')->name('veterinarios.search');
     Route::post('veterinarios/changePassword','VeterinarioController@changePassword')->name('veterinarios.change.password');

     //CASO DE USO 4 GESTIONAR MASCOTA
     Route::get('categorias', 'CategoriaController@index')->name('categorias.index');
     Route::get('categorias/create', 'CategoriaController@create')->name('categorias.create');
     Route::post('categorias/store', 'CategoriaController@store')->name('categorias.store');
     Route::get('categorias/{categoria}/edit','CategoriaController@edit')->name('categorias.edit');
     Route::put('categorias/{categoria}/update', 'CategoriaController@update')->name('categorias.update');
     Route::delete('categorias/{categoria}/delete', 'CategoriaController@destroy')->name('categorias.delete');
     
     //CASO DE USO 5 GESTIONAR PRODUCTOS
     Route::get('productos', 'ProductoController@index')->name('productos.index');
     Route::get('productos/create', 'ProductoController@create')->name('productos.create');
     Route::post('productos/store', 'ProductoController@store')->name('productos.store');
     Route::get('productos/{producto}/edit','ProductoController@edit')->name('productos.edit');
     Route::put('productos/{producto}/update', 'ProductoController@update')->name('productos.update');
     Route::delete('productos/{producto}/delete', 'ProductoController@destroy')->name('productos.delete');

     Route::get('obtener/precio/{producto}', 'ProductoController@getPrecio')->name('productos.precio');
          //CASO DE USO 5 GESTIONAR VENTAS

    Route::get('ventas', 'VentaController@index')->name('ventas.index');
    Route::get('ventas/create', 'VentaController@create')->name('ventas.create');
    Route::post('ventas/store', 'VentaController@store')->name('ventas.store');
    Route::get('ventas/{producto}/edit','VentaController@edit')->name('ventas.edit');
    Route::put('ventas/{producto}/update', 'VentaController@update')->name('ventas.update');
    Route::delete('ventas/{producto}/delete', 'VentaController@destroy')->name('ventas.delete');
  


       
});

