<?php

//rutas productos
Route::get('panel/productos', 'ProductController@view')->name('productos.index');
//recurso que consume vue.js
Route::get('panel/api/productos', 'ProductController@showProducts');
//recurso que consume vue.js
Route::get('panel/productos/test', 'ProductController@test');
//guardar producto
Route::post('panel/api/productos', 'ProductController@storeProduct');
//actualizar producto
Route::put('panel/api/productos/{producto}', 'ProductController@updateProduct');
//borrar producto
Route::delete('panel/api/productos/{producto}', 'ProductController@deleteProduct');
//borrar producto
Route::get('panel/api/productos/{producto}', 'ProductController@showProduct');
/***********************************************************************************/

/***********************************************************************************/
//rutas categorias
Route::get('panel/categorias', 'CategoryProduct@view')->name('categorias.index');
//recurso que consume vue.js
Route::get('panel/api/categorias', 'CategoryProduct@showCategories');
//guardar producto
Route::post('panel/api/categorias', 'CategoryProduct@storeProduct');
//actualizar producto
Route::put('panel/api/categorias/{categoria}', 'CategoryProduct@updateCategory');
//borrar categoria
Route::delete('panel/api/categorias/{categoria}', 'CategoryProduct@deleteCategory');

/***********************************************************************************/
// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/panel', 'HomeController@index')->name('home');
