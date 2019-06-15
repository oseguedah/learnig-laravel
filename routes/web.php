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
    Route::get('/', 'employe\EmployeeCtrl@employees')->name('employee.main');
    Route::get('grid', 'employe\EmployeeCtrl@grid')->name('employee.grid');
    Route::post('save', 'employe\EmployeeCtrl@save')->name('employee.save');
    Route::get('get', 'employe\EmployeeCtrl@get')->name('employee.get');
    Route::delete('delete', 'employe\EmployeeCtrl@delete')->name('employee.delete');;
});

Route::group(array('prefix'=>'commons'),function(){
    Route::get('/', 'ConstansJsCtrl@getConstants')->name('commons.constants');
});
