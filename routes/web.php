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
})->name('inicio');

Route::get('/login', function () {
  return view('auth.login');
})->name('login');

Route::get('/contacto', function () {
  return view('contact');
})->name('contacto');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/contact', function () {
  return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
//PERSONALIZACION 
       // Route::post('color', 'UserController@color')->name('color');
        //CASO DE USO 1 GESTIONAR CLIENTE
      
      Route::get('clientes' , 'ClienteController@index')->name('clientes.index');
      Route::get('clientes/create', 'ClienteController@create')->name('clientes.create');
      Route::get('clientes/{cliente}/edit','ClienteController@edit')->name('clientes.edit');
      Route::post('clientes/store', 'ClienteController@store')->name('clientes.store');
      Route::put('clientes/{cliente}/update', 'ClienteController@update')->name('clientes.update');
      Route::delete('clientes/{cliente}/delete', 'ClienteController@destroy')->name('clientes.delete');

       //CASO DE USO 1 GESTIONAR MASCOTA
      Route::get('mascotas', 'MascotaController@index')->name('mascotas.index');
      Route::get('mascotas/create', 'MascotaController@create')->name('mascotas.create');
      Route::post('mascotas/store', 'MascotaController@store')->name('mascotas.store');
      Route::get('mascotas/{mascota}/edit','MascotaController@edit')->name('mascotas.edit');
      Route::put('mascotas/{mascota}/update', 'MascotaController@update')->name('mascotas.update');
      Route::delete('mascotas/{mascota}/delete', 'MascotaController@destroy')->name('mascotas.delete');

      Route::get('obtener/amo/{mascota}', 'MascotaController@getAmo')->name('mascotas.obtener');

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
      Route::get('ventas/show/{venta}','VentaController@show')->name('ventas.show');
      Route::get('ventas/{venta}/edit','VentaController@edit')->name('ventas.edit');
      Route::put('ventas/{venta}/update', 'VentaController@update')->name('ventas.update');
      Route::delete('ventas/{venta}/delete', 'VentaController@destroy')->name('ventas.delete');
      Route::get('ventas/reporte/{venta}', 'VentaController@pdf')->name('ventas.pdf');


     //CASO DE USO 7 GESTIONAR ATENCION
     Route::get('atenciones', 'AtencionController@index')->name('atenciones.index');
     Route::get('atenciones/create', 'AtencionController@create')->name('atenciones.create');
     Route::post('atenciones/store', 'AtencionController@store')->name('atenciones.store');
     Route::get('atenciones/show/{atencion}','AtencionController@show')->name('atenciones.show');
     Route::get('atenciones/{atencion}/edit','AtencionController@edit')->name('atenciones.edit');
     Route::put('atenciones/{atencion}/update', 'AtencionController@update')->name('atenciones.update');
     Route::delete('atenciones/{atencion}/delete', 'AtencionController@destroy')->name('atenciones.delete');
     Route::get('atenciones/reporte/{atencion}', 'AtencionController@pdf')->name('atenciones.pdf');

       
     //CASO DE USO 8 REPORTES Y ESTADISTICAS + Personalizacion
     Route::get('charts/atenciones/line', 'ReporteController@atenciones')->name('charts.atenciones');
     Route::get('charts/veterinarios', 'ReporteController@veterinarios')->name('charts.veterinarios');
     Route::get('charts/productos', 'ReporteController@productos')->name('charts.productos');


     Route::get('search', 'BuscadorController@index')->name('search.index');
   //  Route::get('search', 'BuscadorController@buscar')->name('search.index');

   
});

