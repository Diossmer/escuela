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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('documento',function(){
    $pdf = \PDF::loadView('planilla.pdf');
    return $pdf->stream();
})->name('pdf');
Route::group(['middleware' => ['admin'], 'namespace'=>'Admin'], function () {
    Route::resource('admin','AdminController');
});
Route::group(['namespace'=>'User'], function () {
    Route::resource('docente','DocenteController',['except'=>['destroy']]);
});
