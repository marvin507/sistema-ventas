<?php

//rutas productos
Route::get('panel/productos', 'ProductController@view')->name('productos.index');
//recurso que consume vue.js
Route::get('panel/api/productos', 'ProductController@showProducts');
//guardar producto
Route::post('panel/api/productos', 'ProductController@storeProduct');
//actualizar producto
Route::put('panel/api/productos/{producto}', 'ProductController@updateProduct');
//borrar producto
Route::delete('panel/api/productos/{producto}', 'ProductController@deleteProduct');

// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/panel', 'HomeController@index')->name('home');
