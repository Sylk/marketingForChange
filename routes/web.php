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

// TODO: Disable the register route

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('companies', 'CompanyController@index')->name('companies');
Route::get('company/new', 'CompanyController@create')->name('company.create');
Route::get('{companyId}', 'CompanyController@edit')->name('company.edit');
Route::post('{companyId}', 'CompanyController@store')->name('company.store');
Route::patch('{companyId}', 'CompanyController@update')->name('company.update');
Route::delete('{companyId}', 'CompanyController@destroy')->name('company.delete');

Route::get('{companyId}/employees', 'EmployeeController@index')->name('employees');
Route::get('{companyId}/{employeeId}', 'EmployeeController@edit')->name('employee.edit');
Route::patch('{companyId}/{employeeId}', 'EmployeeController@update')->name('employee.update');
Route::delete('{companyId}/{employeeId}', 'EmployeeController@destroy')->name('employee.delete');
