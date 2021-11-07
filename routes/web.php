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

    /* --- |Rutas de Criptomonedas| --- */
//Listado de criptomonedas
Route::get('/', 'MonedaController@read');
//Formulario Create para Criptomoneda
Route::get("/criptomoneda/create", "MonedaController@createForm");
//Guardar datos de tabla criptomoneda
Route::post("/criptomoneda/save", "MonedaController@save")->name("save");
//Formulario para Update de criptomoneda
Route::get('/criptomoneda/update/{id}','MonedaController@updateForm');
//Modificar Criptomoneda
Route::patch('/criptomoneda/edit/{id}','MonedaController@edit')->name('edit');
//Delete Criptomoneda
Route::delete('/criptomoneda/delete/{id}','MonedaController@delete')->name('deleteCoin');

    /* --- |Rutas de Lenguajes| --- */
//Listado de Lenguajes
//Listado de Roles
Route::get('/lenguaje/read', 'LenguajeController@read');
//Formulario Create para Criptomoneda
Route::get("/lenguaje/create", "LenguajeController@createForm");
//Guardar datos de tabla Lenguaje
Route::post("/lenguaje/save", "LenguajeController@save")->name("save");
//Formulario para Update de Lenguaje
Route::get('/lenguaje/update/{id}','LenguajeController@updateForm');
//Modificar Lenguaje
Route::patch('/lenguaje/edit/{id}','LenguajeController@edit')->name('edit');
//Delete Lenguaje
Route::delete('/lenguaje/delete/{id}','LenguajeController@delete')->name('delete');


