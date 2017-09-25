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

Route::get('/', 'ChartController@index');
Route::get('/{month}', 'ChartController@index');


Route::get('/mail', 'MailController@index');

Route::post('/mail/send', 'MailController@send');