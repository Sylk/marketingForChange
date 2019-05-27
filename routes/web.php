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

//  Note: This would work in a perfect world, and wouldn't be considered sludgy but this is crap code lol
//Route::get('register', function() {
//    return redirect()->route('login');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('companies', 'CompanyController@index')->name('companies');
Route::get('company/{companyId}', 'CompanyController@edit');
Route::post('company/{companyId}', 'CompanyController@store')->name('storeCompany');
Route::delete('company/{companyId}', 'CompanyController@destroy');

Route::get('Employees', 'EmployeeController@index')->name('employees');
