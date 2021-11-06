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

Route::get('/', 'MonedaController@read');

//Formulario Create para Criptomoneda
Route::get("/criptomoneda/create", "MonedaController@createForm");

//Guardar datos de tabla criptomoneda
Route::post("/save", "MonedaController@save")->name("save");

//Formulario para Update de criptomoneda
Route::get('/criptomoneda/update/{id}','MonedaController@updateForm');

//Modificar Criptomoneda
Route::patch('/edit/{id}','MonedaController@edit')->name('edit');

//Delete Criptomoneda
Route::delete('/delete/{id}','MonedaController@delete')->name('delete');
