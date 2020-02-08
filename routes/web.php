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
    return view('admin.index');
})->middleware('auth');

Auth::routes(['register'=>false]);

Route::get('locale/{locale}',function ($locale){
   \Illuminate\Support\Facades\Session::put('locale',$locale);
   return redirect()->back();
});

//Companies Routes

Route::get('/companies','CompaniesController@index')->name('companies');

Route::get('/companies/create','CompaniesController@companyAdd')->name('companyAdd');
Route::post('/companies/create','CompaniesController@companyStore')->name('companyStore');

Route::get('/companies/{company}','CompaniesController@companyEdit')->name('companyEdit');
Route::put('/companies/{company}','CompaniesController@companyUpdate')->name('companyUpdate');

Route::delete('/companies/{company}','CompaniesController@delete')->name('companyDelete');


//Employees Routes

Route::get('/employees','EmployeesController@index')->name('employees');

Route::get('/employee/create','EmployeesController@employeeAdd')->name('employeeAdd');
Route::post('/employee/create','EmployeesController@employeeStore')->name('employeeStore');

Route::get('/employees/{employee}','EmployeesController@employeeEdit')->name('employeeEdit');
Route::put('/employees/{employee}','EmployeesController@employeeUpdate')->name('employeeUpdate');

Route::delete('/employees/{employee}','EmployeesController@delete')->name('employeeDelete');
