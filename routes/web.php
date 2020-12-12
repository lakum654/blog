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

Route::get('/', function () {
    return view('welcome');
});

Route::view('ajax','ajax');
Route::any('insert','CrudController@insert');
Route::any('delete/{id}','CrudController@delete');
Route::any('edit/{id}','CrudController@edit');
Route::any('loadData','CrudController@loaddata');
Route::view('fileUpload','file');
Route::any('upload','FileController@upload');
Route::any('test','CrudController@test');


// Route::get('checkage/{age}',function(){
// 	return view('file');
// })->middleware('checkage');

Route::group(['middleware'=>'checkage'],function(){
	Route::view('checkage/{age}','file');
});


Route::get('job','FileController@job');


Route::resource('employee','EmployeeController');
Route::any('employees','EmployeeController@employee')->name('employee');
Route::any('employee/delete/{id}','EmployeeController@delete');


Route::resource('lakum','LakumController');
Route::get('users','LakumController@users')->name('users');