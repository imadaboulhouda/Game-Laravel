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
Route::post('/code','CadeauController@code')->name('showCadeau');
Route::group(['middleware'=>'auth','prefix'=>'cadeau'],function(){
    Route::match(['get','post'],'/index','CadeauController@index')->name('cadeau.index');
    Route::match(['get','post'],'/add','CadeauController@add')->name('cadeau.add');
    Route::delete('/delete','CadeauController@delete')->name('cadeau.delete');
    Route::match(['get','post'],'/update/{id}','CadeauController@editF')->name('cadeau.edit');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
