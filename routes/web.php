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

Route::group(array('prefix'=>'employees'),function(){
    Route::get('/', 'EmployeeCtrl@employees');
    Route::get('grid', 'EmployeeCtrl@grid');
    Route::post('save', 'EmployeeCtrl@save');
    Route::get('get', 'EmployeeCtrl@get');
    Route::delete('delete', 'EmployeeCtrl@delete');
});
