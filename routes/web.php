<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@redireccion');


Route::group(['prefix' => 'index'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('arrendatario', 'ArrendatarioController');
    Route::post('dueno/buscar', 'DuenoController@buscar')->name('dueno.buscar');
    Route::get('dueno/listar', 'DuenoController@listar')->name('dueno.lista');
    Route::resource('dueno', 'DuenoController');
    Route::resource('casa', 'CasaController');
    Route::post('arrienda/buscar', 'ArriendaController@buscar')->name('arrienda.buscar');
    Route::resource('arrienda', 'ArriendaController');
    Route::resource('telefono', 'TelefonoController');
    Route::get('persona', 'HomeController@listar')->name('persona.index');
});