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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'InfoController@index');
Route::get('/indonesia', 'InfoController@indonesia');
Route::get('/global', 'InfoController@dunia');
Route::get('/grafik', 'InfoController@chart');
