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

Route::get('/', 'CrudController@listar');
Route::get('/criar', 'CrudController@criar');
Route::post('/criar', 'CrudController@criarA');

Route::get('/delet/{id}', 'CrudController@delet');

