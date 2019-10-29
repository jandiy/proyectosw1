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

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');
    Route::get('/home/{id}', 'HomeController@destroy');

    Route::resource('users','UserController');
    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index']);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create']);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store']);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit']);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy']);

    ///////////// Routas del sistema de gestion

Route::resource('categorias','CategoriaController');
Route::resource('paises','PaisController');
Route::resource('acciones','AccionterapeuticaController');
Route::resource('lotes','LoteController');
Route::resource('posiciones','PosicionController');
Route::resource('provedores','ProvedorController');
Route::resource('laboratorios','LaboratorioController');
Route::resource('medicamentos','MedicamentoController');
Route::resource('compras','CompraController');
Route::resource('marcas','MarcaController');
Route::resource('medidas','MedidaController');
Route::resource('productos','ProductoController');
Route::resource('ofertas','OfertaController');
Route::resource('payments','PaymentController');


Route::patch('productos/cantidad/{id}',['as'=>'productos.updateB','uses'=>'ProductoController@updateB']);

Route::post('carrito/add/{id}',['as'=>'carts.add','uses'=>'CartController@add']);
Route::get('carrito',['as'=>'carts.index','uses'=>'CartController@index']);
Route::delete('carrito/{id}',['as'=>'carts.destroy','uses'=>'CartController@destroy']);
Route::post('carrito/create',['as'=>'carts.store','uses'=>'CartController@store']);
Route::post('carrito/createB',['as'=>'carts.storeB','uses'=>'CartController@storeB']);
Route::get('carrito/miscarritos',['as'=>'carts.indexB','uses'=>'CartController@indexB']);
Route::get('entregas',['as'=>'entregas.index','uses'=>'EntregaController@index']);
Route::patch('entregas/{id}',['as'=>'entregas.update','uses'=>'EntregaController@update']);
Route::get('entregas/misentregas',['as'=>'entregas.indexB','uses'=>'EntregaController@indexB']);
Route::patch('entregas/{id}/update',['as'=>'entregas.updateB','uses'=>'EntregaController@updateB']);

Route::patch('calificaciones/{id}',['as'=>'calificaciones.update','uses'=>'CalificacionController@update']);
Route::get('calificaciones',['as'=>'calificaciones.index','uses'=>'CalificacionController@index']);
});

Route::resource('bitacoras','BitacoraController');
Route::resource('perfiles','PerfilController');
Route::get('/home', 'HomeController@index');
Route::resource('permissions','PermissionController');
Route::get('/backup',['as'=>'backup.index','uses'=>'BackupController@index']);
Route::get('backup/create', ['as'=> 'backup.create','uses'=>'BackupController@create']);
Route::get('backup/download/{file_name}',['as'=>'backup.download', 'uses'=>'BackupController@download']);
Route::get('backup/delete/{file_name}',['as'=>'backup.delete','uses'=> 'BackupController@delete']);
Route::resource('backup','BackupController');






