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
    Route::get('admin/user','AdminController@user')->name('admin.user');
    Route::get('admin','AdminController@index')->name('admin.index');
    Route::get('admin/create','AdminController@create')->name('admin.create');
    Route::post('admin','AdminController@store')->name('admin.store');
    Route::get('admin/{id}','AdminController@show')->name('admin.show');
    Route::get('admin/{id}/edit','AdminController@edit')->name('admin.edit');
    Route::put('admin/{admin}','AdminController@update')->name('admin.update');
    Route::delete('admin/{admin}','AdminController@destroy')->name('admin.destroy');
    Route::resource('roles', 'RoleController',['except'=>['show']]);
});

Route::group(['namespace'=>'Docente'], function () {
    Route::resource('docente','DocenteController',['except'=>['edit','index','store','update','create','destroy']]);
    Route::resource('periodo','DocenteController',['except'=>['destroy','show']]);
    Route::resource('seccion', 'SeccionController',['except'=>['destroy','show']]);
    Route::resource('representante', 'RepresentanteController',['except'=>['destroy']]);
    Route::resource('alumno', 'AlumnoController',['except'=>['destroy']]);
});

//https://github.com/farhanwazir/laravelgooglemaps

//validar formulario...

/* Cuando tengas el usuario colocar el rol */
//asignar autorizacion de crud a un rol con un checkbox...
