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
/**
 * Main
 */
Route::redirect('/', '/dashboard');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
/**
 * Login
 */
Auth::routes();
/**
 * Usuario
 */
Route::resource('usuarios', 'UsuarioController');
/**
 * Reporte
 */
Route::post('reportes/filter', 'ReporteController@filter')->name('reportes.filter');
Route::resource('reportes', 'ReporteController');